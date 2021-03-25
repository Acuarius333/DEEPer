<?php
if ($averageRating == 1.00){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">';}
elseif ($averageRating <= 1.50){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/a/a7/Star_rating_1.5_of_5.png">';}
elseif ($averageRating <= 2.00){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">';}
elseif ($averageRating <= 2.50){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Star_rating_2.5_of_5.png">';}
elseif ($averageRating <= 3.00){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">';}
elseif ($averageRating <= 3.50){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Star_rating_3.5_of_5.png">';}
elseif ($averageRating <= 4.00){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">';}
elseif ($averageRating <= 4.50){
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Star_rating_4.5_of_5.png">';}
else {
    $averageRating = '<img style="position: absolute; display: block; width: 250px; height: 56px; margin-top: -35px; margin-left: 170px" class="starImg" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">';}
?>