          var greeting;
	          if (new Date().getHours() < 19) {
	          	    greeting = "Good day!";
	          } 
	          else {
	              greeting = "Good evening!";
	          }
          document.getElementById("kebabiOslo").innerHTML = greeting;