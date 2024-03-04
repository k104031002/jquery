<!doctype html>
<html lang="en">

<head>
    <title>Users</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row g-3" id="userList">
                    <!-- <div class="col-md-6">
                        <div class="card p-3">
                            <button type="button" class="btn btn-primary">
                                Button
                            </button>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <h2 id="account">帳號Account</h2>
                <ul>
                    <li>姓名name: <span id="name"></span></li>
                    <li>郵箱email: <span id="email"></span></li>
                    <li>電話tel: <span id="tel"></span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        axios.get('/api/users.php')
            .then((response) => {
                // console.log(response.data);
                let users = response.data.users;
                // console.log(users);
                let userList = "";
                users.forEach((user) => {
                    userList += ` <div class="col-md-6">
                        <div class="card p-3">
                            <button type="button" class="btn btn-primary"
                            data-id="${user.id}">
                                ${user.account}
                            </button>
                        </div>
                    </div>
                    `
                })
                $("#userList").append(userList)
            })
            .catch((error) => {
                console.error(error);
            })

        $("#userList").on("click", ".btn", function() {
            // console.log("click");
            let id = $(this).data("id")
            // console.log(id);
            const formData = new FormData();
            formData.append("id", id);

            axios.post('/api/user.php', formData)
                .then((response) => {
                    // console.log(response.data);
                    let user = response.data.user;
                    // console.log(user);
                    $("#account").text(user.account)
                    $("#name").text(user.name)
                    $("#email").text(user.email)
                    $("#tel").text(user.phone)
                })
                .catch((error) => {
                    console.error(error);
                });

        })
    </script>

</body>

</html>