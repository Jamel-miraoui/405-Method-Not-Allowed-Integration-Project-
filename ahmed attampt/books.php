<!-- //dispay all books from data base file  -->
<?php
// Connect to the database
// ini_set("display_errors",'1');
// error_reporting(E_ALL);
require_once('connbd.php');
//check sesson 
require_once('sessonchek.php');
//navbar
include 'navANDhead.php';

// Get the books from the database
$query = "SELECT * FROM books";
$books = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>
    <div>
<a class='button' href="uplodebookform.php"><span>&#43;</span>Add<br>Book</a>
    </div>
    
    <table>

        <section>
        <main>
        <div class="book-container">
        <!-- dispaly al books in db secton -->
        <?php foreach ($books as $book): ?>

                <div class="book">
                <a href="download.php?filename=<?php echo urlencode($book['file_path']);?>"><img src="<?php echo $book['cover_path']; ?>" alt="Book 3" width="300"></a>
					<h3><?php echo $book['title']; ?></h3>
					<p><?php echo $book['author']; ?></p>
                    
                    
				</div>
        <?php endforeach; ?>
    </table>
    </div>
        </section>
        </main>
</body>
</html>
