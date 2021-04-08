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

    if ($resultData !== false) {
        $row = mysqli_fetch_array($resultData);
        $visitorId = $row['ID'];
    }

    return $visitorId;
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
    Functions related to search for available tours
*/

# Returns whether a search form field is left as default
function isSpecified($field) {
    return $field !== '*';
}

# Generic search template
function tourSearchQuery ($link, $guide, $month, $day, $year) {
    $sql  = "SELECT G.Name, Date(T.DateTime) AS TourDate, Time(T.DateTime) AS TourTime, T.VisitorCount ";
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
        header("location: ../tours.php?error=stmtfailed");
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