<?php
include 'top.php';
?>
<main class="straight">
    <h2>Knitting Stitches!</h2>
    <section class="box-1">
        <h3>Basic Knitting stitches</h3>
        <p>If you're new to knitting but you're ready to dive into some new challenges, then these are the stitches for you.
            The stitches in the table are the foundational stitches for most patterns.</p>
        <table>
            <tr>
                <th>Name of Stitch</th>
                <th>Description of Stitch</th>
                <th>Tutorial</th>
            </tr>
            <?php
            $sql= 'SELECT fldName, fldDescription, fldTutorial FROM tblBasicStitches';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $records = $statement->fetchAll();
            foreach ($records as $record){
                print '<tr>';
                print '<td>' . $record['fldName'] . '</td>';
                print '<td>' . $record['fldDescription'] . '</td>';
                print '<td><a href="' . $record['fldTutorial'] . '" target="_blank">Link</a></td>';
                print '</tr>' . PHP_EOL;
            }
            ?>
            <tr>
                <td colspan="3"><cite><a href="https://knittingknowledge.com/knitting-guides/knitting-stitches/#garter-stitch" target="_blank">Source: Knitting Knowledge</a></cite></td>
            </tr>
        </table>
    </section>
    <section class="box-2">
        <h3>Intermediate Stitches</h3>
        <p>Don't be discouraged! Although it is daunting being called "Intermediate", these stitches are just less common.</p>
        <table>
            <tr>
                <th>Name of stitch</th>
                <th>Description of Stitch</th>
                <th>Tutorial</th>
            </tr>
            <?php
            $sql= 'SELECT fldName, fldDescription, fldTutorial FROM tblIntermedStitches';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $records = $statement->fetchAll();
            foreach ($records as $record){
                print '<tr>';
                print '<td>' . $record['fldName'] . '</td>';
                print '<td>' . $record['fldDescription'] . '</td>';
                print '<td><a href="' . $record['fldTutorial'] . '" target="_blank">Link</a></td>';
                print '</tr>' . PHP_EOL;
            }
            ?>
            <tr>
                <td colspan="3"><cite><a href="https://knittingknowledge.com/knitting-guides/knitting-stitches/#garter-stitch" target="_blank">Source: Knitting Knowledge</a></cite></td>
            </tr>
        </table>
    </section>
    <section class="box-3">
        <h3>Advanced Stitches</h3>
        <p>Be weary, it gets a little complicated here but I have faith in you! These stitches can inspire you to keep practicing, as practice makes perfect!</p>
        <table>
            <tr>
                <th>Name of stitch</th>
                <th>Description of Stitch</th>
                <th>Tutorial</th>
            </tr>
            <?php
            $sql= 'SELECT fldName, fldDescription, fldTutorial FROM tblAdvStitches';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $records = $statement->fetchAll();
            foreach ($records as $record){
                print '<tr>';
                print '<td>' . $record['fldName'] . '</td>';
                print '<td>' . $record['fldDescription'] . '</td>';
                print '<td><a href="' . $record['fldTutorial'] . '" target="_blank">Link</a></td>';
                print '</tr>' . PHP_EOL;
            }
            ?>
            <tr>
                <td colspan="3"><cite><a href="https://knittingknowledge.com/knitting-guides/knitting-stitches/#garter-stitch" target="_blank">Source: Knitting Knowledge</a></cite></td>
            </tr>
        </table>
    </section>
</main>
<?php include 'footer.php';?>