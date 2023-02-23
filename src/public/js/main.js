$(".phone").mask("+375 (99) 999-99-99")

let option = document.createElement('option')
option.innerText = "Сначала выберите марку автомобиля"
$("#model-select").html(option).prop('required', true)
$("#model-select option").attr('value', '')

$('#form-select').on('change', function () {

    let selectData = $(this).val();

    $.ajax({
            type: 'GET',
            url: `models.php?query=${selectData}`,
            success: function (selectData) {

                const data = JSON.parse(selectData)

                const options = data.map(function (el) {
                    const element = document.createElement('option')
                    element.innerText = el.model
                    return element;
                })
                $('#model-select').html(options).prop('disabled', false);
            }
        }
    )
})


