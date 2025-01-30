// resources/js/member.js
document.addEventListener("DOMContentLoaded", function () {
    // Validasi tanggal
    const startDateInput = document.getElementById("start_date");
    const endDateInput = document.getElementById("end_date");

    if (startDateInput && endDateInput) {
        startDateInput.addEventListener("change", function () {
            endDateInput.min = this.value;
            if (endDateInput.value && endDateInput.value < this.value) {
                endDateInput.value = this.value;
            }
        });

        // Set tanggal minimal awal
        startDateInput.min = new Date().toISOString().split("T")[0];
        if (startDateInput.value) {
            endDateInput.min = startDateInput.value;
        }
    }

    // Validasi nomor telepon (hanya angka dan karakter khusus yang diizinkan)
    const phoneInput = document.getElementById("phone");
    if (phoneInput) {
        phoneInput.addEventListener("input", function (e) {
            this.value = this.value.replace(/[^0-9\s\-\+\(\)]/g, "");
        });
    }

    // Konfirmasi sebelum menghapus
    const deleteButtons = document.querySelectorAll('button[type="submit"]');
    deleteButtons.forEach((button) => {
        if (button.textContent.trim() === "Nonaktifkan") {
            button.addEventListener("click", function (e) {
                if (
                    !confirm(
                        "Apakah Anda yakin ingin menonaktifkan member ini?"
                    )
                ) {
                    e.preventDefault();
                }
            });
        }
    });

    // Auto-submit form filter
    const filterForm = document.querySelector('form[action*="members"]');
    if (filterForm) {
        const filterInputs = filterForm.querySelectorAll("select");
        filterInputs.forEach((input) => {
            input.addEventListener("change", () => filterForm.submit());
        });
    }
});
