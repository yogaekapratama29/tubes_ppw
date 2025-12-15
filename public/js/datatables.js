window.initDataTable = function (selector, options = {}) {
    let defaultOptions = {
        processing: true,
        pageLength: 10,
        ordering: true,
        searching: true,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                next: "Berikutnya",
                previous: "Sebelumnya",
            },
        },
    };

    $(selector).DataTable({
        ...defaultOptions,
        ...options,
    });
};
