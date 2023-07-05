<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $defaultPhoto = "user.png";
    $studentNo = $_POST["StudentNo"];
    $name = $_POST["Name"];
    $surname = $_POST["Surname"];
    $program = $_POST["Program"];
    $semesterGrade = 3.8;
    $semester = "Spring";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Registration</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #6f9de2;
        }
        .logo {
            text-align: center;
            margin-bottom: auto;
        }

        .logo img {
            width: 200px;
        }

        .user {
            text-align: center;
            margin-bottom: 20px;
        }

        .user img {
            width: 100px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .section {
            width: 100%;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h1, h2 {
            color: #333;
            margin-top: 0;
        }

        select, button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            background-color: #6f9de2;
            color: #fff;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6f9de2;
            color: #fff;
        }

        .comment-section textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .comment-section button {
            background-color: #6f9de2;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .bordermain {
            width: 580px;
            margin: 0 auto;
            padding: 55px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 10px;
    
        }

        .label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
    </style>
    <script>

        var data = [
        { value: "<img src='user.png'>" },
        { label: "Student Name:", value: "<?php echo $name; ?> <?php echo $surname; ?>" },
        { label: "Program:", value: "<?php echo $program; ?>" },
        { label: "Semester Grade:", value: "<?php echo $semesterGrade; ?>" },
        { label: "Semester:", value: "<?php echo $semester; ?>" }
        ];

        function createDataBoxes() {
        var container = document.getElementById("dataContainer");

        for (var i = 0; i < data.length; i++) {
            var dataItem = data[i];

            var boxContainer = document.createElement("div");
            boxContainer.className = "data-box";

            var label = document.createElement("p");
            label.className = "label";
            label.textContent = dataItem.label;

            var value = document.createElement("p");
            value.className = "value";
            value.innerHTML = dataItem.value;

            boxContainer.appendChild(label);
            boxContainer.appendChild(value);

            container.appendChild(boxContainer);
        }
        }

        window.addEventListener("load", createDataBoxes);



        function addCourse() {
            var select = document.getElementById("courseList");
            var selectedOption = select.options[select.selectedIndex];
            var selectedCourse = selectedOption.value;

            if (selectedCourse === "") {
                return;
            }

            var courseTable = document.getElementById("courseTable");
            var rowCount = courseTable.rows.length - 1;
            if (rowCount >= 5) {
                alert("You can only choose a maximum of 5 courses.");
                return;
            }

            var newRow = courseTable.insertRow(-1);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            cell1.innerHTML = selectedOption.text;
            cell2.innerHTML = '<button onclick="removeCourse(this.parentNode.parentNode)">Delete</button>';

            select.removeChild(selectedOption);
        }

        function removeCourse(row) {
            var courseTable = document.getElementById("courseTable");
            var courseList = document.getElementById("courseList");
            var courseName = row.cells[0].innerHTML;

            courseTable.deleteRow(row.rowIndex);

            var newOption = document.createElement("option");
            newOption.text = courseName;
            courseList.add(newOption);
        }

        function sendComment() {
        var commentTextarea = document.getElementById("commentTextarea");
        var comment = commentTextarea.value;

        if (comment === "") {
            alert("Please enter a comment before submitting.");
            return;
        }

        var recipient = "your-email@example.com"; 
        var subject = "Comment from Course Registration"; 
        var body = "Comment: " + comment;

        var mailtoLink = "mailto:" + recipient + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

        window.open(mailtoLink);

        commentTextarea.value = "";
    }
    </script>
</head>
<body>
    <div class="bordermain">
        <div class="container">
        <br/>
            <div class="logo">
                <img src="eul_logo.png" alt="Logo">  <br> <br>
            </div>
            <h1>European University of Lefke</h1>
         
            <div id="dataContainer"></div>
                <h1>Course Registration</h1>

                <div class="section">
                    <h2>Add Courses</h2>
                    <select id="courseList">
                        <option value="">Select a course</option>
                        <option value="Course 1">CFE201 LEADERSHIP AND MANAGEMENT</option>
                        <option value="Course 2">CFE202 ENVIRONMENT AND SUSTAINABLE DEVELOPMENT</option>
                        <option value="Course 3">COMP 464 INTERNET PROGRAMMING</option>
                        <option value="Course 4">ENGG434 ENGINEERING ETHICS</option>
                        <option value="Course 5">COMP 448 ARTIFICIAL NEURAL NETWORKS</option>
                        <option value="Course 6">SENG212 SOFTWARE REQUIREMENTS ANALYSIS AND SPECIFICATION</option>
                        <option value="Course 7">SENG312 HUMAN COMPUTER INTERACTION</option>
                        <option value="Course 8">COMP342 COMPUTER NETWORKS</option>
                        <option value="Course 9">COMP 415 ARTIFICIAL INTELLIGENCE</option>
                        <option value="Course 10">COMP 471 JAVA PROGRAMMING</option>
                    </select>
                    <div class="add-btn-container">
                        <button onclick="addCourse()">Add</button>
                    </div>
                </div>

                <div class="section">
                    <h2>Selected Courses</h2>
                    <table id="courseTable">
                        <tr>
                            <th>Course Name</th>
                            <th>Action</th>
                        </tr>
                    </table>
                </div>

                <div class="section">
                    <h2>Comment Section</h2>
                    <div class="comment-section">
                        <textarea id="commentTextarea" placeholder="Enter your comment"></textarea>
                        <br>
                        <button onclick="sendComment()">Submit</button>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>

