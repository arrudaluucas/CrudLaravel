const getCitys = () => {
    axios.get('/get-citys', {
        params: {
            state_id: $("#state").val()
        }
    })
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    })
    .then(function () {
        // always executed
    });
}
