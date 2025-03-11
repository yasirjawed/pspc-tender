<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
<!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
    integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
    integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
<!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
<link rel="stylesheet" href="{{ asset('backend/css/adminlte.css') }}">
<!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
    integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.27/es2015/jodit.fat.min.css"
    integrity="sha512-fF5+q0FeDBwH38Qi9PtCB0RM+mzYx5+cvawlmtrvfmJpLiCp6zdcIUUerNCNmKqqpqLoHWK1Sz1QTDolZ8G0WA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .blinking-circle {
        width: 20px;
        height: 20px;
        background-color: rgb(56, 238, 0);
        border-radius: 50%;
        display: inline-block;
        animation: blink 1s infinite alternate;
        position: absolute;
        right: 1px;
    }

    .blinking-tic {
        width: 20px;
        height: 20px;
        background-color: rgb(36, 146, 2);
        border-radius: 50%;
        display: inline-block;
        position: absolute;
        right: 1px;
    }

    .blinking-tic::after {
        content: "";
        position: absolute;
        top: 45%;
        left: 50%;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: translate(-50%, -50%) rotate(45deg);
    }

    @keyframes blink {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0.3;
        }
    }

    ul.nav.sidebar-menu.flex-column {
        margin: 0 0 0 -18px;
    }
</style>
