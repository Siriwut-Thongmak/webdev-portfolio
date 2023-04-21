<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <Title>Register</Title>
    </head>
    
    <body>
        <section class="section-form">
            <div class="row">
                <h2>ADD MOVIE</h2>
            </div>
             <div class="row">
                <form method="get" action="movie_insert.php" name="MOVIE" class="contact-form">

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="Title">Movie Title</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="MoiveName" id="MoiveName" placeholder="Movie Title" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="duration">Duration</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="number" name="Duration" id="Duration" placeholder="Movie's Duration" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="GetInDate">Get In Date</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="date" name="GetInDate" id="GetIn" placeholder="Get In Date" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="GetOutDate">Get Out Date</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="date" name="GetOutDate" id="GetOut" placeholder="Get Out Date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
             </div>
        </section>
        
    
    </body>
</html>
 






