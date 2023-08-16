/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }

    // Delete
    const deleteButtons = document.querySelectorAll(".delete-action");
    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const form = this.closest(".delete-form");
            Swal.fire({
                title: "Bạn có chắc chắn?",
                text: "Nếu xóa, bạn không thể khôi phục!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ok, Đồng ý xóa!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    const getSlug = (title) => {

        // Đổi chữ hoa thành chữ thường
        let str = title.toLowerCase();

        // Đổi ký tự có dấu thành không dấu
        const diacriticsMap = {
            'à': 'a', 'á': 'a', 'ạ': 'a', 'ả': 'a', 'ã': 'a', 'â': 'a', 'ầ': 'a', 'ấ': 'a', 'ậ': 'a', 'ẩ': 'a', 'ẫ': 'a', 'ă': 'a', 'ằ': 'a', 'ắ': 'a', 'ặ': 'a', 'ẳ': 'a', 'ẵ': 'a',
            'è': 'e', 'é': 'e', 'ẹ': 'e', 'ẻ': 'e', 'ẽ': 'e', 'ê': 'e', 'ề': 'e', 'ế': 'e', 'ệ': 'e', 'ể': 'e', 'ễ': 'e',
            'ì': 'i', 'í': 'i', 'ị': 'i', 'ỉ': 'i', 'ĩ': 'i',
            'ò': 'o', 'ó': 'o', 'ọ': 'o', 'ỏ': 'o', 'õ': 'o', 'ô': 'o', 'ồ': 'o', 'ố': 'o', 'ộ': 'o', 'ổ': 'o', 'ỗ': 'o', 'ơ': 'o', 'ờ': 'o', 'ớ': 'o', 'ợ': 'o', 'ở': 'o', 'ỡ': 'o',
            'ù': 'u', 'ú': 'u', 'ụ': 'u', 'ủ': 'u', 'ũ': 'u', 'ư': 'u', 'ừ': 'u', 'ứ': 'u', 'ự': 'u', 'ử': 'u', 'ữ': 'u',
            'ỳ': 'y', 'ý': 'y', 'ỵ': 'y', 'ỷ': 'y', 'ỹ': 'y',
            'đ': 'd',
        };

        str = str.replace(/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/gi, match => diacriticsMap[match]);

        // Đổi khoảng trắng thành ký tự gạch ngang
        str = str.replace(/\s/gi, "-");

        // Đổi nhiều ký tự gạch ngang liên tiếp thành một ký tự gạch ngang
        str = str.replace(/\-+/gi, "-");

        // Bỏ dấu câu, kí tự đặc biệt
        str = str.replace(/[!@%^*()+=<>?\/,.:;'&#[\]~$_`{}|\\]/gi, " ");

        return str;
    }

    const title = document.querySelector('.title');
    const slug = document.querySelector('.slug');
    let isChangeSlug = false;

    if(slug.value === ''){
        title.addEventListener('keyup', (e) => {
            if(!isChangeSlug){
                const titleValue = e.target.value;
                slug.value = getSlug(titleValue);
            }
        });
    }


    slug.addEventListener('change', () => {
        if(slug.value === ''){
            const title = document.querySelector('.title');
            const titleValue = title.value;
            slug.value = getSlug(titleValue);
        }
        isChangeSlug = true;
    });




});
