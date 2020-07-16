/**
 * Bootstrap Table Thai translation
 * Author: Monchai S.<monchais@gmail.com>
 */
(function ($) {
    'use strict';

    $.fn.bootstrapTable.locales['th-TH'] = {
        formatLoadingMessage: function () {
            //return 'กำลังโหลดข้อมูล, กรุณารอสักครู่...';
            return 'loading, please waitู่...';
        },
        formatRecordsPerPage: function (pageNumber) {
            //return pageNumber + ' รายการต่อหน้า';
            return pageNumber + ' items per page';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            //return 'รายการที่ ' + pageFrom + ' ถึง ' + pageTo + ' จากทั้งหมด ' + totalRows + ' รายการ';
            return 'No.่ ' + pageFrom + ' To ' + pageTo + ' Total ' + totalRows + ' items';
        },
        formatSearch: function () {
            //return 'ค้นหา';
            return 'Search';
        },
        formatNoMatches: function () {
            //return 'ไม่พบรายการที่ค้นหา !';
            return 'Not found !';
        },
        formatRefresh: function () {
            //return 'รีเฟรส';
            return 'Refresh';
        },
        formatToggle: function () {
            //return 'สลับมุมมอง';
            return 'Swap camera';
        },
        formatColumns: function () {
            //return 'คอลัมน์';
            return 'Column';
        }
    };

    $.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales['th-TH']);

})(jQuery);
