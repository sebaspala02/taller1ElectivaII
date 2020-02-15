function validarLogin(fl, tipo) {

    fl.type.value = tipo;

    if (tipo === "con") {
        if (fl.usuario.value !== "" && fl.password.value !== "") {
            fl.submit();
        } else {
            alert("ingrese todos los datos");
        }
    } else {
        fl.submit();
    }
}