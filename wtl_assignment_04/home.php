<!DOCTYPE html>
<html>
<head>
    <style>
        body 
        {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 40px;
        }

        input 
        {
            padding: 10px;
            margin: 5px 0;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
        }

        button 
        {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover 
        {
            background-color: #45a049;
        }

        #output 
        {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 5px;
            min-height: 50px;
        }
    </style>
</head>
<body>
    <h2>Student Data Form</h2>
    
    ID: <input type="text" id="id0" placeholder="Enter student ID">
    Name: <input type="text" id="id1" placeholder="Enter student name">
    Marks: <input type="text" id="id2" placeholder="Enter marks">

    <button type="button" onclick="send()">Submit</button>
    <button type="button" onclick="dlt()">Delete by ID</button>
    <button type="button" onclick="update()">Update by ID</button>

    <div id="output"></div>

    <script>
        async function send() 
        {
            let d = new FormData();
            d.append("sid", document.getElementById("id0").value);
            d.append("sname", document.getElementById("id1").value);
            d.append("smark", document.getElementById("id2").value);
            d.append("action", "insert");

            let response = await fetch("http://localhost/WTL_LAB/home1.php", {
                method: "POST",
                body: d
            });

            let text = await response.text();
            document.getElementById("output").innerHTML = text;
        }

        async function dlt() 
        {
            let id = prompt("Enter the ID to delete:");
             if(!id)
            {
                return;
            } 

            let response = await fetch(`http://localhost/WTL_LAB/home1.php?action=delete&id=${id}`);
            let text = await response.text();
            document.getElementById("output").innerHTML = text;
        }

        async function update() 
        {
            let id = prompt("Enter the ID to update:");
            if(!id)
            {
                return;
            } 
            let newName = prompt("Enter new Name:");
            let newMarks = prompt("Enter new Marks:");

            let d = new FormData();
            d.append("sid", id);
            d.append("sname", newName);
            d.append("smark", newMarks);
            d.append("action", "update");

            let response = await fetch("http://localhost/WTL_LAB/home1.php", {
                method: "POST",
                body: d
            });

            let text = await response.text();
            document.getElementById("output").innerHTML = text;
        }
    </script>
</body>
</html>
