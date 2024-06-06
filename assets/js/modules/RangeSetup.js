export class RangeSetup {
    constructor() {
        this.minPriceRange = document.querySelector('.car_filter_minPrice');
        this.maxPriceRange = document.querySelector('.car_filter_maxPrice');
        this.minYearRange = document.querySelector('.car_filter_minYear');
        this.maxYearRange = document.querySelector('.car_filter_maxYear');
        this.minKmRange = document.querySelector('.car_filter_minKm');
        this.maxKmRange = document.querySelector('.car_filter_maxKm');

        this.minPriceValue = document.querySelector('.minPriceValue');
        this.maxPriceValue = document.querySelector('.maxPriceValue');
        this.minYearValue = document.querySelector('.minYearValue');
        this.maxYearValue = document.querySelector('.maxYearValue');
        this.minKmValue = document.querySelector('.minKmValue');
        this.maxKmValue = document.querySelector('.maxKmValue');

        this.setupEventListeners();
    }

    setupEventListeners() {
        this.minPriceRange.addEventListener('input', () => {
            this.minPriceValue.textContent = this.minPriceRange.value + ' €';
        });

        this.maxPriceRange.addEventListener('input', () => {
            this.maxPriceValue.textContent = this.maxPriceRange.value + ' €';
        });

        this.minYearRange.addEventListener('input', () => {
            this.minYearValue.textContent = this.minYearRange.value;
        });

        this.maxYearRange.addEventListener('input', () => {
            this.maxYearValue.textContent = this.maxYearRange.value;
        });

        this.minKmRange.addEventListener('input', () => {
            this.minKmValue.textContent = this.minKmRange.value + ' km';
        });

        this.maxKmRange.addEventListener('input', () => {
            this.maxKmValue.textContent = this.maxKmRange.value + ' km';
        });
    }
}

const filterUI = new RangeSetup();
