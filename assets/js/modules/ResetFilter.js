export class ResetFilter {
    constructor(formClass) {
        this.formClass = formClass;
        this.resetButton = document.querySelector(".reset-button");
        this.resetButton.addEventListener("click", () => this.resetForm());
    }

    resetForm() {
        const form = document.querySelector(`.${this.formClass}`);
        form.reset();
        this.resetFilters();
    }

    resetFilters() {
        const minPriceInput = document.querySelector(".min-price-input");
        const maxPriceInput = document.querySelector(".max-price-input");
        minPriceInput.value = minPriceInput.min;
        maxPriceInput.value = maxPriceInput.max;

        const minYearInput = document.querySelector(".min-year-input");
        const maxYearInput = document.querySelector(".max-year-input");
        minYearInput.value = minYearInput.min;
        maxYearInput.value = maxYearInput.max;

        const minKmInput = document.querySelector(".min-km-input");
        const maxKmInput = document.querySelector(".max-km-input");
        minKmInput.value = minKmInput.min;
        maxKmInput.value = maxKmInput.max;
    }
}
