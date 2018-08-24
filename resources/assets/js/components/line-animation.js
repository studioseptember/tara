$(function() {
    if($('#occupied-lines').length) {
        var svg = document.getElementById('occupied-lines');
        var s = Snap(svg);

        var path1 = Snap.select('#shape1-path1');
        var path2 = Snap.select('#shape1-path2');
        var path3 = Snap.select('#shape1-path3');
        var path1Points = path1.node.getAttribute('d');
        var path2Points = path2.node.getAttribute('d');
        var path3Points = path3.node.getAttribute('d');

        var path4 = Snap.select('#shape2-path1');
        var path5 = Snap.select('#shape2-path2');
        var path6 = Snap.select('#shape2-path3');
        var path4Points = path4.node.getAttribute('d');
        var path5Points = path5.node.getAttribute('d');
        var path6Points = path6.node.getAttribute('d');

        var firstPointArray = [path1Points, path2Points, path3Points];
        var secondPointArray = [path4Points, path5Points, path6Points];

        var counter = 1;
        var countup = true;

        var secondCounter = 1;
        var secondCountup = false;

        function animateFirstPath() {
            path1.animate({ d: firstPointArray[counter] }, 7500, mina.easeinout, function() {
                if (countup) {
                    counter++;
                    if(counter >= 2) {
                        countup = false;
                    }
                } else {
                    counter--;

                    if(counter <= 0) {
                        countup = true;
                    }
                }

                animateFirstPath();
            });
        }

        animateFirstPath();

        function animateSecondPath() {
            path4.animate({ d: secondPointArray[secondCounter] }, 7500, mina.easeinout, function() {
                if (secondCountup) {
                    secondCounter++;
                    if(secondCounter >= 2) {
                        secondCountup = false;
                    }
                } else {
                    secondCounter--;

                    if(secondCounter <= 0) {
                        secondCountup = true;
                    }
                }

                animateSecondPath();
            });
        }
        animateSecondPath();
    }
});