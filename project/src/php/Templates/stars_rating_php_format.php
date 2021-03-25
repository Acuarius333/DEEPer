<?php if (($checkIns->rating)==1) {
echo '<img style="width: 100px; height: 20px; margin-left: 400px; margin-top: 20px; position: absolute; z-index: 2;" src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Star_rating_1_of_5.png">';
}elseif (($checkIns->rating)==2) {
echo '<img style = "width: 100px; height: 20px; margin-left: 400px; margin-top: 20px; position: absolute; z-index: 2;" src = "https://upload.wikimedia.org/wikipedia/commons/9/95/Star_rating_2_of_5.png">';
}elseif (($checkIns->rating)==3) {
echo '<img style = "width: 100px; height: 20px; margin-left: 400px; margin-top: 20px; position: absolute; z-index: 2;" src = "https://upload.wikimedia.org/wikipedia/commons/2/2f/Star_rating_3_of_5.png">';
}elseif (($checkIns->rating)==4) {
echo '<img style = "width: 100px; height: 20px; margin-left: 400px; margin-top: 20px; position: absolute; z-index: 2;" src = "https://upload.wikimedia.org/wikipedia/commons/f/fa/Star_rating_4_of_5.png">';
}elseif (($checkIns->rating)==5) {
echo '<img style="width: 100px; height: 20px; margin-left: 400px; margin-top: 20px; position: absolute; z-index: 2;" src="https://upload.wikimedia.org/wikipedia/commons/1/17/Star_rating_5_of_5.png">';
}
?>