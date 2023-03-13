<select id="mySelect" onchange="myFunction()">
    <option value="" disabled selected hidden>Choose a Technology</option>
    <option value="HTML">HTML</option>
    <option value="CSS">CSS</option>
    <option value="Javascript">Javascript</option>
    <option value="PHP">PHP</option>
</select>


<p id="show"></p>

<script>
    function myFunction() {
        var value = document.getElementById("mySelect").value;
        var x = document.getElementById("show")
        x.innerHTML = "Selected Value: " + value;
    }
</script>