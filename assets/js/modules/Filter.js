export class Filter {
    constructor(formId, carListId) {
        this.form = document.getElementById(formId);
        this.carList = document.getElementById(carListId);
        this.form.addEventListener('submit', this.handleSubmit.bind(this));
    }

    handleSubmit(event) {
        event.preventDefault();
        const formData = new FormData(this.form);
        fetch(this.form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            this.renderCars(data.cars);
        })
        .catch(error => console.error('Error:', error));
    }

    renderCars(cars) {
        this.carList.textContent = '';
        cars.forEach(car => {
            const carDiv = document.createElement('div');
            carDiv.classList.add('car');

            const pricePara = document.createElement('p');
            pricePara.textContent = `Prix: ${car.price} €`;
            carDiv.appendChild(pricePara);

            const kmPara = document.createElement('p');
            kmPara.textContent = `Kilomètres: ${car.kilometers}`;
            carDiv.appendChild(kmPara);

            const yearPara = document.createElement('p');
            yearPara.textContent = `Année: ${car.year}`;
            carDiv.appendChild(yearPara);

            this.carList.appendChild(carDiv);
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const filter = new Filter('filter-form', 'car-list');
});