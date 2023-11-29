<?php include 'top.php';?>
<main>
    <h1>SQL</h1>
    <h2>create table</h2>
    <pre>
        CREATE TABLE tblBasicStitches(
            pmkBasicstitchID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldName varchar(50),
            fldDescription varchar(250),
            fldTutorial varchar(250)
        )
    </pre>

    <h2>insert data</h2>
    <pre>
        INSERT INTO tbl BasicStitches (fldName, fldDescription, fldTutorial) VALUES
        ('Garter Stitch', 'Foundation for many different stitches, uses knit stitch for every row to create rows of ridges that look the same on both sides.', 'https://www.thesprucecrafts.com/garter-stitch-4164738'),
        ('Stockinette Stick', 'Involves alternating rows of knit stitches and purl stitches based on the right and wrong side of the fabric.', 'https://sarahmaker.com/stockinette-stitch/'),
        ('Rib Stitch', 'Involves creating columns of alternating knit and purl stitches. Use yarn with clearer stitch definition', 'https://www.stitchandstory.com/pages/rib-stitch-knitting-tutorial'),
        ('Cable stitch', 'Involves twisting a vertical row of knit and purl stitches to create a cable', 'https://nimble-needles.com/stitches/how-to-knit-the-cable-stitch/'),
        ('Seed Stitch', 'Involves alternating knit and purl stitches. Requires you to reverse the sequence of knit and purls on each row.', 'https://www.dummies.com/article/home-auto-hobbies/crafts/knitting-crocheting/how-to-knit-the-seed-stitch-197594/'),
        ('Moss Stitch', 'Involves alternating knit and purl stitches. Requires you to reverse the sequence every two rows.', 'https://mycrochetory.com/crochet-the-moss-stitch-tutorial/')
    </pre>

    <h2>select records</h2>
    <pre>
    SELECT fldName, fldDescription, fldTutorial FROM tblBasicStitches
    </pre>

    <h2>create 2nd table</h2>
    <pre>
        CREATE TABLE tblIntermedStitches(
            pmkIntermedStitchID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldName varchar(50),
            fldDescription varchar(250),
            fldTutorial varchar(250)
        )
    </pre>

    <h2>insert data</h2>
    <pre>
        INSERT INTO tblIntermedStitches (fldName, fldDescription, fldTutorial) VALUES
        ('Bamboo Stitch', 'Involves knitch stitch, yarn overs, slipped stitches. Begins on right side and involves passing the yarn over, knitting two stitches, passing the yarn over those two stitches and then repeating.', 'https://www.youtube.com/watch?v=1fs8uOyECgU'),
        ('Basketweave Stitch', 'Alternates knits and purls equal amounts.', 'https://www.youtube.com/watch?v=FMy5lu1jTJ8'),
        ('Herringbone Stitch', 'Involves knitting two stitches into the back of the stitches cast on, slipping one of these stitches, knitting two more into the stitch on the left needle. Repear, but with purl stitches.', 'https://www.youtube.com/watch?v=6W8EcEiqZJc'),
        ('Bubble Stitch', 'Most rows are stockinette stitch, then uses knit-four-down technique every six rows.', 'https://www.youtube.com/watch?v=QySkiceyK2A'),
        ('Bobble Stitch', 'Knit one purl one, increase twice, then knit and purl four stitches on each side', 'https://www.youtube.com/watch?v=wX_bsxTWCF8'),
        ('Andalusian Stitch', 'Four row repear of stockinette stitch, but includes one row of knit one purl one.', 'https://www.youtube.com/watch?v=EjMphgPTLKs')
    </pre>

    <h2>select records</h2>
    <pre>
    SELECT fldName, fldDescription, fldTutorial FROM tblIntermedStitches
    </pre>
    
    <h2>create 3rd table</h2>
    <pre>
        CREATE TABLE tblAdvStitches(
            pmkAdvstitchID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldName varchar(50),
            fldDescription varchar(250),
            fldTutorial varchar(250)
        )
    </pre>

    <h2>insert data</h2>
    <pre>
        INSERT INTO tblAdvStitches (fldName, fldDescription, fldTutorial) VALUES
        ('Fair Isle', 'Involves two colors per row and a limit of five colors.', 'https://www.youtube.com/watch?v=5YigmhhyQEM'),
        ('Intarsia', 'One active color per stitch, but does not involve carrying yarn across the back.', 'https://www.youtube.com/watch?v=ES7gTLtcEVs'),
        ('Raspberry Stitch', 'Similar to bobble stitch, repeats 4 stitches across 4 rows.', 'https://www.youtube.com/watch?v=FipIuWIlBsE'),
        ('Hurdle Stitch', 'combination of the garter stitch for two rows and a simple rib stitch for another two rows.', 'https://www.youtube.com/watch?v=XNTEwSphFO0'),
        ('Seersucker Stitch', '8-row repeat stitch pattern that creates raised diamond shapes', 'https://www.youtube.com/watch?v=s5z4yR9py88'),
        ('Caterpillar Stitch', 'Uses both stockinette and garter stitches', 'https://www.youtube.com/watch?v=URpBAR5FpuA')
    </pre>

    <h2>select records</h2>
    <pre>
    SELECT fldName, fldDescription, fldTutorial FROM tblAdvStitches
    </pre>

    <h2>create form table</h2>
    <pre>
    CREATE TABLE tblKnittingForm(
    pmkKnitFormID INT AUTO_INCREMENT PRIMARY KEY,
    fldFirstName varchar(30) DEFAULT NULL,
    fldLastName varchar(30) DEFAULT NULL,
    fldEmail varchar(50) DEFAULT NULL,
    fldKnitter varchar(16) DEFAULT NULL,
    fldStitches tinyint(1) DEFAULT 0,
    fldPatterns tinyint(1) DEFAULT 0,
    fldHistory tinyint(1) DEFAULT 0,
    fldNothing tinyint(1) DEFAULT 0
    )
    </pre>
    </main>
<?php include 'footer.php';?>
