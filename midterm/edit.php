<div class="edit">
    <label for="search">Search</label>
    <input type="text" id="search">
    <label for="">By</label>
    <select id="search_by">
        <option value="f_name">First Name</option>
        <option value="l_name">Last Name</option>
    </select>
    <button name="search">Search</button>
    <br>
    <br>

    <div id="users">
    </div>

</div>

<script>
    search();
    function update(id) {
        var inputs = document.getElementById(id)
        var data = {'id' : id};
        console.log(data)
        // YOU CAN USE document.getElementById('mydiv').getElementsByTagName('input') 
        for (let i = 0; i < inputs.children.length; i++) {
            if (inputs.children[i].tagName == "INPUT") {
                data[inputs.children[i].name] = inputs.children[i].value;
            }
        }
        fetch("ajax_update.php", {
                method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
        .then(res => res.text())
        .then(data => {
            console.log(data)
        })
    }

    function search() {
        var data = {};
        var search = document.getElementById("search");
        var search_by = document.getElementById("search_by");
        data["key"] = search.innerHTML;
        data["col"] = search_by.value;
        
        fetch("ajax_search.php", {
            method: 'POST',
            herders: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
        .then(res => res.text())
        .then(data => {
            data = JSON.parse(data)
            var users_container = document.getElementById("users");
            var user;
            data.forEach(u => {
                let br = document.createElement("br");
                let br2 = document.createElement("br");
                let f_name = document.createElement("input");
                f_name.setAttribute("name", "f_name");
                f_name.setAttribute("value", u['f_name']);
                
                let l_name = document.createElement("input");
                l_name.setAttribute("name", "l_name");
                l_name.setAttribute("value", u['l_name']);
                
                let date = document.createElement("input");
                date.setAttribute("type", "date");
                date.setAttribute("name", "l_name");
                date.setAttribute("value", u['l_name']);

                // dob, presonal_id, position
                users_container.appendChild(f_name);
                users_container.appendChild(br);
                users_container.appendChild(l_name);
                users_container.appendChild(br2);
                users_container.appendChild();
            })
        })
    }

</script>