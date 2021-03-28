<!DOCTYPE html>
<html>
<head>
    <title>Art Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Art Gallery Management System</h1>
    </div>
    <div class="sidenav">
        <a href="#artwork">Artwork</a>
        <a href="#tours">Tours</a>
        <a href="#about">About Us</a>
        <br>
        <a href="#manage>">Manage</a>
    </div>
    <div class="main">
        <table>
            <!-- <caption>Artwork</caption> -->
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Artist</th>
                <th>Year</th>
                <th>Price</th>
                <th>Type</th>
                <th>Movement</th>
            </tr>
            <tr>
                <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/300px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg" alt="Mona Lisa" ></td>
                <td><i>Mona Lisa</i></td>
                <td>Leonardo de Vinci</td>
                <td>1517</td>
                <td>$100 million</td>
                <td>Painting</td>
                <td>Renaissance</td>
            </tr>
        </table>
        <p>The Mona Lisa (/ˌmoʊnə ˈliːsə/; Italian: Monna Lisa [ˈmɔnna ˈliːza] or La Gioconda [la dʒoˈkonda]; French: La Joconde) is a half-length portrait painting by Italian artist Leonardo da Vinci. Considered an archetypal masterpiece of the Italian Renaissance,[4][5] it has been described as "the best known, the most visited, the most written about, the most sung about, the most parodied work of art in the world".[6] The painting's novel qualities include the subject's enigmatic expression,[7] the monumentality of the composition, the subtle modelling of forms, and the atmospheric illusionism.[8]
            
            The painting is probably of the Italian noblewoman Lisa Gherardini,[9] the wife of Francesco del Giocondo, and is in oil on a white Lombardy poplar panel. It had been believed to have been painted between 1503 and 1506; however, Leonardo may have continued working on it as late as 1517. It was acquired by King Francis I of France and is now the property of the French Republic itself, on permanent display at the Louvre, Paris since 1797.[10]
            
            The Mona Lisa is one of the most valuable paintings in the world. It holds the Guinness World Record for the highest known insurance valuation in history at US$100 million in 1962[11] (equivalent to $660 million in 2019). 
        </p>
        <h4>Creation and Date</h4>
        <p>Of Leonardo da Vinci's works, the Mona Lisa is the only portrait whose authenticity has never been seriously questioned,[43] and one of four works – the others being Saint Jerome in the Wilderness, Adoration of the Magi and The Last Supper – whose attribution has avoided controversy.[44] He had begun working on a portrait of Lisa del Giocondo, the model of the Mona Lisa, by October 1503.[14][15] It is believed by some that the Mona Lisa was begun in 1503 or 1504 in Florence.[45] Although the Louvre states that it was "doubtless painted between 1503 and 1506",[8] art historian Martin Kemp says that there are some difficulties in confirming the dates with certainty.[18] Alessandro Vezzosi believes that the painting is characteristic of Leonardo's style in the final years of his life, post-1513.[46] Other academics argue that, given the historical documentation, Leonardo would have painted the work from 1513.[47] According to Vasari, "after he had lingered over it four years, [he] left it unfinished".[13] In 1516, Leonardo was invited by King Francis I to work at the Clos Lucé near the Château d'Amboise; it is believed that he took the Mona Lisa with him and continued to work on it after he moved to France.[25] Art historian Carmen C. Bambach has concluded that Leonardo probably continued refining the work until 1516 or 1517.[48] Leonardo's right hand was paralytic circa 1517,[49] which may indicate why he left the Mona Lisa unfinished.[50][51][52][a]</p>
        <p>Of Leonardo da Vinci's works, the Mona Lisa is the only portrait whose authenticity has never been seriously questioned,[43] and one of four works – the others being Saint Jerome in the Wilderness, Adoration of the Magi and The Last Supper – whose attribution has avoided controversy.[44] He had begun working on a portrait of Lisa del Giocondo, the model of the Mona Lisa, by October 1503.[14][15] It is believed by some that the Mona Lisa was begun in 1503 or 1504 in Florence.[45] Although the Louvre states that it was "doubtless painted between 1503 and 1506",[8] art historian Martin Kemp says that there are some difficulties in confirming the dates with certainty.[18] Alessandro Vezzosi believes that the painting is characteristic of Leonardo's style in the final years of his life, post-1513.[46] Other academics argue that, given the historical documentation, Leonardo would have painted the work from 1513.[47] According to Vasari, "after he had lingered over it four years, [he] left it unfinished".[13] In 1516, Leonardo was invited by King Francis I to work at the Clos Lucé near the Château d'Amboise; it is believed that he took the Mona Lisa with him and continued to work on it after he moved to France.[25] Art historian Carmen C. Bambach has concluded that Leonardo probably continued refining the work until 1516 or 1517.[48] Leonardo's right hand was paralytic circa 1517,[49] which may indicate why he left the Mona Lisa unfinished.[50][51][52][a]</p>
        <p>Of Leonardo da Vinci's works, the Mona Lisa is the only portrait whose authenticity has never been seriously questioned,[43] and one of four works – the others being Saint Jerome in the Wilderness, Adoration of the Magi and The Last Supper – whose attribution has avoided controversy.[44] He had begun working on a portrait of Lisa del Giocondo, the model of the Mona Lisa, by October 1503.[14][15] It is believed by some that the Mona Lisa was begun in 1503 or 1504 in Florence.[45] Although the Louvre states that it was "doubtless painted between 1503 and 1506",[8] art historian Martin Kemp says that there are some difficulties in confirming the dates with certainty.[18] Alessandro Vezzosi believes that the painting is characteristic of Leonardo's style in the final years of his life, post-1513.[46] Other academics argue that, given the historical documentation, Leonardo would have painted the work from 1513.[47] According to Vasari, "after he had lingered over it four years, [he] left it unfinished".[13] In 1516, Leonardo was invited by King Francis I to work at the Clos Lucé near the Château d'Amboise; it is believed that he took the Mona Lisa with him and continued to work on it after he moved to France.[25] Art historian Carmen C. Bambach has concluded that Leonardo probably continued refining the work until 1516 or 1517.[48] Leonardo's right hand was paralytic circa 1517,[49] which may indicate why he left the Mona Lisa unfinished.[50][51][52][a]</p>
    </div> 
</body>
</html>

<?php
require_once 'connect.php';
$sql = "SELECT * FROM guide";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));

echo "<h2>Test</h2><br>";
while($row = mysqli_fetch_array($result)) {
    echo "Guide name " . $row['Name'] . "<br>";
}
?>