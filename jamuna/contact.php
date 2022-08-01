<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  input[type=text], select, textarea {
  width: 80%; 
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: skyblue;
  color: white;
  padding: 15px 25px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 80%;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: gold;
}

.contact {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 70%;
}
h1{
  color: skyblue;
}
</style>
</head>
<body>

  
<h1>Contact Us</h1>

<div class="contact">
  <form action="">
    <input type="text" id="fname" name="firstname" placeholder="Your firstname..">

    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    

    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
<br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
