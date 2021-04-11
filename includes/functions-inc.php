<?php

/*
    Functions related to login/signup
*/

function verifyVisitorLogin($link,$email, $pass) {
    $sql = "SELECT ID FROM visitor WHERE Email = ? AND Password = ?";

    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    $visitorId = -1;

    if ($resultData !== false && mysqli_num_rows($resultData) > 0) {
        $row = mysqli_fetch_array($resultData);
        $visitorId = $row['ID'];
    }

    return $visitorId;
}

function verifyEmployeeLogin($link,$email, $pass) {
    $sql = "SELECT ID FROM employee WHERE Email = ? AND Password = ?";

    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../employee-login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    $employeeId = -1;

    if ($resultData !== false && mysqli_num_rows($resultData) > 0) {
        $row = mysqli_fetch_array($resultData);
        $employeeId = $row['ID'];
    }

    return $employeeId;
}

function anyEmptyFields($name, $email, $pass, $phone) {
    return empty($name) || empty($email) || empty($pass) || empty($phone);
}

function existingEmail($link, $email) {
    $sql = "SELECT Email FROM visitor WHERE Email= ?";

    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    $row = mysqli_fetch_array($result);
    return $row['Email'] !== null;
}

function createVisitor($link,$name,$email,$pass,$phone) {
    $sql = "INSERT INTO visitor (Name, Email, Password, PhoneNum) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $pass, $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

/*
Functions related to book / delete specific tours
*/
function toDateTime($date, $time) {
    return date("Y-m-d H:i:s", strtotime($date . " ". $time));
}

function getGuideData($link, $tguide) {
    $sql = "SELECT * FROM guide WHERE Name= ?";

    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tours.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $tguide);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return mysqli_fetch_array($result);
}

function getTourSpots($link, $guide_id, $date, $time) {
    $sql = "SELECT SpotsLeft FROM tour WHERE GuideID= ? AND DateTime= ?";

    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tours.php?error=stmtfailed");
        exit();
    }

    $datetime = toDateTime($date, $time);
    mysqli_stmt_bind_param($stmt, "ss", $guide_id, $datetime);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    
    $row = mysqli_fetch_array($result);
    return $row['SpotsLeft'];
}

function updateTourSpots($link, $guide_id, $date, $time, $newSpots) {
    $sql = "UPDATE tour SET SpotsLeft= ? WHERE GuideID= ? AND DateTime= ?";

    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tours.php?error=stmtfailed");
        exit();
    }

    $datetime = toDateTime($date, $time);
    mysqli_stmt_bind_param($stmt, "sss", $newSpots, $guide_id, $datetime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return true;
}

function isRepeatBooking($link, $guide_id, $date, $time, $visitor_id) {
    $sql = "SELECT TourDateTime FROM tourvisitor WHERE TourGuideID= ? AND TourDateTime= ? AND VisitorID= ?";

    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tours.php?error=stmtfailed");
        exit();
    }

    $datetime = toDateTime($date, $time);
    mysqli_stmt_bind_param($stmt, "sss", $guide_id, $datetime, $visitor_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    $row = mysqli_fetch_array($result);
    return $row !== null;
}

function bookTour($link, $guide_id, $date, $time, $visitor_id, $partySize) {
    # Prepare transaction
    mysqli_autocommit($link, false);

    # Prepare insert statement of tour into tourvisitor which holds all booked tours
    $sql = "INSERT INTO tourvisitor (TourGuideID, TourDateTime, VisitorID) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tours.php?error=stmtfailed");
        exit();
    }
    $datetime = toDateTime($date, $time);
    mysqli_stmt_bind_param($stmt, "sss", $guide_id, $datetime, $visitor_id);

    # Rollback transaction when not enough spots for the party size booking or repeat booking by user
    $availableSpots = getTourSpots($link, $guide_id, $date, $time);

    if ($availableSpots < $partySize) {
        mysqli_rollback($link);
        return false;
    } else if (isRepeatBooking($link, $guide_id, $date, $time, $visitor_id)) {
        mysqli_rollback($link);
        return false;
    } else {
        # Execute insert of booked tour into tourvisitor
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        # Update tour spots
        updateTourSpots($link, $guide_id, $date, $time, $availableSpots - $partySize);
        mysqli_commit($link);
        return true;
    }
}

function deleteBookedTour($link, $guide_id, $date, $time, $visitor_id, $partySize) {
    # Prepare delete statement of tour into tourvisitor which holds all booked tours
    $sql = "DELETE FROM tourvisitor WHERE TourGuideID= ? AND TourDateTime= ? AND VisitorID = ?";
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tours.php?error=stmtfailed");
        exit();
    }

 function deleteToursAdmin($link, $guide_id, $date, $time, $visitor_id, $partySize) {
        # Prepare delete statement of tours in admin role
        $sql = "DELETE FROM tourvisitor WHERE TourGuideID= ? AND TourDateTime= ? AND VisitorID = ?";
        $stmt = mysqli_stmt_init($link);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../tours.php?error=stmtfailed");
            exit();
        }
    }
    $datetime = toDateTime($date, $time);
    mysqli_stmt_bind_param($stmt, "sss", $guide_id, $datetime, $visitor_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    # Update spots left in the tour
    $availableSpots = getTourSpots($link, $guide_id, $date, $time);
    updateTourSpots($link, $guide_id, $date, $time, $availableSpots + $partySize);
    return true;
}


/*
    Functions related to search for available tours
*/

# Returns whether a search form field is left as default
function isSpecified($field) {
    return $field !== '*';
}

# Generic search template
function tourSearchQuery ($link, $guide, $month, $day, $year) {
    $sql  = "SELECT G.Name, Date(T.DateTime) AS TourDate, Time(T.DateTime) AS TourTime, T.SpotsLeft ";
    $sql .= "FROM tour AS T ";
    $sql .= "INNER JOIN guide AS G ";
    $sql .= "ON T.GuideID = G.ID ";
    $sql .= "WHERE 1=1 ";

    if (isSpecified($guide)) {
        $sql .= " AND G.Name = ? ";
    }
    if (isSpecified($month)) {
        $sql .= " AND Month(T.DateTime) = ? ";
    }
    if (isSpecified($day)) {
        if ($day < 10) $day = "0" . $day; 
        $sql .= " AND Day(T.DateTime) = ? ";
    }
    if (isSpecified($year)) {
        $sql .= " AND Year(T.DateTime) = ? ";
    }

    $sql .= "ORDER BY T.DateTime";
    
    $stmt = mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../tours.php?error=searchfailed");
        exit();
    }

    attachPlaceholders($stmt, $guide, $month, $day, $year);

    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    return $resultData;
}

function attachPlaceholders($stmt, $guide, $month, $day, $year) {
    if (isSpecified($guide)) {
        if (isSpecified($month)) {
            if (isSpecified($day)) {
                if (isSpecified($year)) {
                    # G, M, D, Y
                    mysqli_stmt_bind_param($stmt, "ssss", $guide, $month, $day, $year);
                } else {
                    # G, M, D, *
                    mysqli_stmt_bind_param($stmt, "sss", $guide, $month, $day);
                }
            } else {
                if (isSpecified($year)) {
                    # G, M, *, Y
                    mysqli_stmt_bind_param($stmt, "sss", $guide, $month, $year);
                } else {
                    # G, M, *, *
                    mysqli_stmt_bind_param($stmt, "ss", $guide, $month);
                }
            }
        } elseif (isSpecified($day)) {
            if (isSpecified($year)) {
                # G, *, D, Y
                mysqli_stmt_bind_param($stmt, "sss", $guide, $day, $year);
            } else {
                # G, *, D, *
                mysqli_stmt_bind_param($stmt, "ss", $guide, $day);
            }
        } elseif (isSpecified($year)) {
            # G, *, *, Y
            mysqli_stmt_bind_param($stmt, "ss", $guide, $year);
        } else {
            # G, *, *, *
            mysqli_stmt_bind_param($stmt, "s", $guide);
        }
    } elseif (isSpecified($month)) {
        if (isSpecified($day)) {
            if (isSpecified($year)) {
                # *, M, D, Y
                mysqli_stmt_bind_param($stmt, "sss", $month, $day, $year);
            } else {
                # *, M, D, *
                mysqli_stmt_bind_param($stmt, "ss", $month, $day);
            }
        } else {
            if (isSpecified($year)) {
                # *, M, *, Y
                mysqli_stmt_bind_param($stmt, "ss", $month, $year);
            } else {
                # *, M, *, *
                mysqli_stmt_bind_param($stmt, "s", $month);
            }
        }
    } elseif (isSpecified($day)) {
        if (isSpecified($year)) {
            # *, *, D, Y 
            mysqli_stmt_bind_param($stmt, "ss", $day, $year);
        } else {
            # *, *, D, *
            mysqli_stmt_bind_param($stmt, "s", $day);
        }
    } elseif (isSpecified($year)) {
        # *, *, *, Y
        mysqli_stmt_bind_param($stmt, "s", $year);
    } else {
        # *, *, *, * no binding required
    }
}