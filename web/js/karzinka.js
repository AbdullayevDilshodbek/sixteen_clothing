// localStorage.clear()
card_count = document.getElementById('card-count')
if(localStorage.ids == null){
    var card = [{}]
}else {
    card = JSON.parse(window.localStorage.ids)
    card_count.innerText = JSON.parse(window.localStorage.ids).length - 1
}

addCar = (id) => {
    if (card.some(item => item.id === id)) {
        alert('Allaqachon savtchada mavjud')
    } else {
        card.push({
            id: id
        })
        localStorage.ids = JSON.stringify(card)
        // alert(localStorage.ids) ----> [{},{"id":10},{"id":11},{"id":12}]
        alert('Saqlandi')
    }
    card_count.innerText = JSON.parse(window.localStorage.ids).length - 1
}
test = () => {
    let array = []
    let a = JSON.parse(localStorage.ids)
    a.forEach(element => {
        if (element.id != null) {
            array.push(element.id)
        }
    })
    document.getElementById('test1').setAttribute('href', `?r=site/karzinka&product_ids=${array}`)
}

total_pay = (product_price,product_discount,id) =>{
    // alert('sava')
    if(document.getElementById(`${id}.a`).value < 1){
        document.getElementById(`${id}.a`).value = 1
    }
    let count = document.getElementById(`${id}.a`).value
    // alert(count)
      document.getElementById(id).value = product_price * count * ((100 - product_discount)/100)
}

clear = () =>{
    alert('sdssds')
    localStorage.clear()
}


