const validation = new JustValidate("#signup");

validation
    .addField("#name", [
    {
        rule:"required",
        errorMessage: "É necessário um usuário para o cadastro"
    }
])
    .addField("#email", [
        {
            rule:"required",
            errorMessage: "É necessário um email para o cadastro"
        },

        {rule: "email"},
        {
            validator: (value) => () =>{
                return fetch("validate-email.php?email=" + encodeURIComponent(value))
                .then (function(response){
                    return response.json();
                })
                .then(function(json){
                    return json.available;
                });
            },
            errorMessage: "Email já em uso."
        }
])
    .addField("#password", [
        {
            rule:"required",
            errorMessage: "É necessário uma senha para o cadastro"
        },
        {
            rule: 'password',
            errorMessage: "A senha deve conter no minimo 8 digitos e números."
        }
])
    .addField("#confirmpassword", [
        {
            validator: (value, fields)=>{
                return value === fields["#password"].elem.value;
            },
            errorMessage: "As senhas devem coincidir."
        }
    ])
    .onSuccess((event) =>{
        document.getElementById("signup").submit();
});