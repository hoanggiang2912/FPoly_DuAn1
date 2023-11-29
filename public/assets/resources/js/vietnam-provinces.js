var provinces = [
    {
        name  : "An Giang",
        cities: ["Huyện An Phú", "Huyện Châu Phú", "Huyện Châu Thành", "Huyện Chợ Mới", "Huyện Phú Tân", "Huyện Tân Châu", "Huyện Thoại Sơn", "Huyện Tịnh Biên", "Huyện Tri Tôn"]
    },
    {
        name  : "Bà Rịa-Vũng Tàu",
        cities: ["Thành phố Vũng Tàu", "Thị xã Bà Rịa", "Huyện Châu Đức", "Huyện Đất Đỏ", "Huyện Long Điền", "Huyện Tân Thành", "Huyện Xuyên Mộc", "Huyện Côn Đảo"]
    },
    {
        name  : "Bạc Liêu",
        cities: ["Huyện Phước Long", "Huyện Hồng Dân", "Huyện Vĩnh Lợi", "Huyện Giá Rai", "Huyện Đông Hải", "Huyện Hòa Bình"]
    },
    {
        name  : "Bắc Cạn",
        cities: ["Thị xã Bắc Kạn", "Huyện Ba Bể", "Huyện Bạch Thông", "Huyện Chợ Đồn", "Huyện Chợ Mới", "Huyện Na Rì", "Huyện Ngân Sơn", "Huyện Pác Nặm"]
    },
    {
        name  : "Bắc Giang",
        cities: ["Thành phố Bắc Giang", "Huyện Yên Thế", "Huyện Tân Yên", "Huyện Lục Ngạn", "Huyện Hiệp Hoà", "Huyện Lạng Giang", "Huyện Sơn Động", "Huyện Lục Nam", "Huyện Việt Yên", "Huyện Yên Dũng"]
    },
    {
        name  : "Bắc Ninh",
        cities: ["Thành phố Bắc Ninh", "Huyện Gia Bình", "Huyện Lương Tài", "Huyện Quế Võ", "Huyện Thuận Thành", "Huyện Tiên Du", "Huyện Từ Sơn", "Huyện Yên Phong"]
    },
    {
        name  : "Bến Tre",
        cities: ["Thị xã Bến Tre", "Huyện Ba Tri", "Huyện Bình Đại", "Huyện Châu Thành", "Huyện Chợ Lách", "Huyện Giồng Trôm", "Huyện Mỏ Cày", "Huyện Thạnh Phú"]
    },
    {
        name  : "Bình Dương",
        cities: ["Thị xã Thủ Dầu Một", "Huyện Bến Cát", "Huyện Dầu Tiếng", "Huyện Tân Uyên", "Huyện Phú Giáo", "Huyện Thuận An", "Huyện Dĩ An"]
    },
    {
        name  : "Bình Định",
        cities: ["Thành phố Qui Nhơn", "Huyện An Lão", "Huyện An Nhơn", "Huyện Hoài Ân", "Huyện Hoài Nhơn", "Huyện Phù Cát", "Huyện Phù Mỹ", "Huyện Tuy Phước", "Huyện Tây Sơn", "Huyện Vân Canh", "Huyện Vĩnh Thạnh"]
    },
    {
        name  : "Bình Phước",
        cities: ["Thị xã Đồng Xoài", "Huyện Bình Long", "Huyện Bù Đăng", "Huyện Bù Đốp", "Huyện Chơn Thành", "Huyện Đồng Phú", "Huyện Lộc Ninh", "Huyện Phước Long"]
    },
    {
        name  : "Bình Thuận",
        cities: ["Thành phố Phan Thiết", "Thị xã La Gi", "Huyện Tuy Phong", "Huyện Bắc Bình", "Huyện Hàm Thuận Bắc", "Huyện Hàm Thuận Nam", "Huyện Tánh Linh", "Huyện Hàm Tân", "Huyện Đức Linh", "Huyện đảo Phú Quý"]
    },
    {
        name  : "Cà Mau",
        cities: ["Thành phố Cà Mau", "Huyện Đầm Dơi", "Huyện Ngọc Hiển", "Huyện Cái Nước", "Huyện Trần Văn Thời", "Huyện U Minh", "Huyện Thới Bình", "Huyện Năm Căn", "Huyện Phú Tân"]
    },
    {
        name  : "Cao Bằng",
        cities: ["Thị xã Cao Bằng", "Huyện Bảo Lạc", "Huyện Bảo Lâm", "Huyện Hạ Lang", "Huyện Hà Quảng", "Huyện Hòa An", "Huyện Nguyên Bình", "Huyện Phục Hòa", "Huyện Quảng Uyên", "Huyện Thạch An", "Huyện Thông Nông", "Huyện Trà Lĩnh", "Huyện Trùng Khánh"]
    },
    {
        name  : "Cần Thơ",
        cities: ["Quận Ninh Kiều", "Quận Bình Thủy", "Quận Cái Răng", "Quận Ô Môn", "Huyện Phong Điền", "Huyện Cờ Đỏ", "Huyện Thốt Nốt", "Huyện Vĩnh Thạnh"]
    },
    {
        name  : "Đà Nẵng",
        cities: ["Quận Hải Châu", "Quận Thanh Khê", "Quận Sơn Trà", "Quận Ngũ Hành Sơn", "Quận Liên Chiểu", "Quận Cẩm Lệ", "Huyện Hòa Vang", "Huyện đảo Hoàng Sa"]
    },
    {
        name  : "Đắk Lắk",
        cities: ["Thành phố Buôn Ma Thuột", "Huyện Krông Buk", "Huyện Krông Pak", "Huyện Lắk", "Huyện Ea Súp", "Huyện M'Drăk", "Huyện Krông Ana", "Huyện Krông Bông", "Huyện Ea H'leo", "Huyện Cư M'gar", "Huyện Krông Năng", "Huyện Buôn Đôn", "Huyện Ea Kar", "Huyện Cư Kuin"]
    },
    {
        name  : "Đắk Nông",
        cities: ["Thị xã Gia Nghĩa", "Huyện Cư Jút", "Huyện Đăk Glong", "Huyện Đăk Mil", "Huyện Đăk R'Lấp", "Huyện Đăk Song", "Huyện Krông Nô", "Huyện Tuy Đức"]
    },
    {
        name  : "Điện Biên",
        cities: ["Thành phố Điện Biên Phủ", "Thị xã Mường Lay", "Huyện Điện Biên", "Huyện Điện Biên Đông", "Huyện Mường Ảng", "Huyện Mường Chà", "Huyện Mường Nhé", "Huyện Tủa Chùa", "Huyện Tuần Giáo"]
    },
    {
        name  : "Đồng Nai",
        cities: ["Thành phố Biên Hoà", "Thị xã Long Khánh", "Huyện Định Quán", "Huyện Long Thành", "Huyện Nhơn Trạch", "Huyện Tân Phú", "Huyện Thống Nhất", "Huyện Vĩnh Cửu", "Huyện Xuân Lộc", "Huyện Cẩm Mỹ", "Huyện Trảng Bom"]
    },
    {
        name  : "Đồng Tháp",
        cities: ["Thành phố Cao Lãnh", "Thị xã Sa Đéc", "Huyện Cao Lãnh", "Huyện Châu Thành", "Huyện Hồng Ngự", "Huyện Lai Vung", "Huyện Lấp Vò", "Huyện Tam Nông", "Huyện Tân Hồng", "Huyện Thanh Bình", "Huyện Tháp Mười"]
    },
    {
        name  : "Gia Lai",
        cities: ["Thành phố Pleiku", "Thị xã An Khê", "Thị xã Ayun Pa", "Huyện Chư Păh", "Huyện Chư Prông", "Huyện Chư Sê", "Huyện Đắk Đoa", "Huyện Đắk Pơ", "Huyện Đức Cơ", "Huyện Ia Grai", "Huyện Ia Pa", "Huyện K'Bang", "Huyện Kông Chro", "Huyện Krông Pa", "Huyện Mang Yang", "Huyện Phú Thiện"]
    },
    {
        name  : "Hà Giang",
        cities: ["Thị xã Hà Giang", "Huyện Bắc Mê", "Huyện Bắc Quang", "Huyện Đồng Văn", "Huyện Hoàng Su Phì", "Huyện Mèo Vạc", "Huyện Quản Bạ", "Huyện Quang Bình", "Huyện Vị Xuyên", "Huyện Xín Mần", "Huyện Yên Minh"]
    },
    {
        name  : "Hà Nam",
        cities: ["Thành phố Phủ Lý", "Huyện Bình Lục", "Huyện Duy Tiên", "Huyện Kim Bảng", "Huyện Lý Nhân", "Huyện Thanh Liêm"]
    },
    {
        name  : "Hà Nội",
        cities: ["Quận Ba Đình", "Quận Cầu Giấy", "Quận Đống Đa", "Quận Hai Bà Trưng", "Quận Hoàn Kiếm", "Quận Hoàng Mai", "Quận Long Biên", "Quận Tây Hồ", "Quận Thanh Xuân", "Huyện Ba Vì", "Huyện Chương Mỹ", "Huyện Đan Phượng", "Huyện Đông Anh", "Huyện Gia Lâm", "Huyện Hoài Đức", "Huyện Mê Linh", "Huyện Mỹ Đức", "Huyện Phú Xuyên", "Huyện Phúc Thọ", "Huyện Quốc Oai", "Huyện Sóc Sơn", "Huyện Thạch Thất", "Huyện Thanh Oai", "Huyện Thanh Trì", "Huyện Thường Tín", "Huyện Từ Liêm", "Huyện Ứng Hòa"]
    },
    {
        name  : "Hà Tây",
        cities: ["Thành phố Hà Đông", "Thành phố Sơn Tây", "Huyện Ba Vì", "Huyện Chương Mỹ", "Huyện Đan Phượng", "Huyện Hoài Đức", "Huyện Mỹ Đức", "Huyện Phú Xuyên", "Huyện Phúc Thọ", "Huyện Quốc Oai", "Huyện Thạch Thất", "Huyện Thanh Oai", "Huyện Thường Tín", "Huyện Ứng Hòa"]
    },
    {
        name  : "Hà Tĩnh",
        cities: ["Thành phố Hà Tĩnh", "Thị xã Hồng Lĩnh", "Huyện Cẩm Xuyên", "Huyện Can Lộc", "Huyện Đức Thọ", "Huyện Hương Khê", "Huyện Hương Sơn", "Huyện Kỳ Anh", "Huyện Nghi Xuân", "Huyện Thạch Hà", "Huyện Vũ Quang", "Huyện Lộc Hà"]
    },
    {
        name  : "Hải Dương",
        cities: ["Thành phố Hải Dương", "Huyện Bình Giang", "Huyện Cẩm Giàng", "Huyện Chí Linh", "Huyện Gia Lộc", "Huyện Kim Thành", "Huyện Kinh Môn", "Huyện Nam Sách", "Huyện Ninh Giang", "Huyện Thanh Hà", "Huyện Thanh Miện", "Huyện Tứ Kỳ"]
    },
    {
        name  : "Hải Phòng",
        cities: ["Quận Dương Kinh", "Quận Đồ Sơn", "Quận Hải An", "Quận Hồng Bàng", "Quận Kiến An", "Quận Lê Chân", "Quận Ngô Quyền", "Huyện An Dương", "Huyện An Lão", "Huyện đảo Bạch Long Vĩ", "Huyện đảo Cát Hải", "Huyện Kiến Thụy", "Huyện Thủy Nguyên", "Huyện Tiên Lãng", "Huyện Vĩnh Bảo"]
    },
    {
        name  : "Hậu Giang",
        cities: ["Thị xã Vị Thanh", "Thị xã Ngã Bảy", "Huyện Châu Thành", "Huyện Châu Thành A", "Huyện Long Mỹ", "Huyện Phụng Hiệp", "Huyện Vị Thủy"]
    },
    {
        name  : "Hòa Bình",
        cities: ["Thành phố Hòa Bình", "Huyện Lương Sơn", "Huyện Cao Phong", "Huyện Đà Bắc", "Huyện Kim Bôi", "Huyện Kỳ Sơn", "Huyện Lạc Sơn", "Huyện Lạc Thủy", "Huyện Mai Châu", "Huyện Tân Lạc", "Huyện Yên Thủy"]
    },
    {
        name  : "TP Hồ Chí Minh",
        cities: ["Quận 1", "Quận 2", "Quận 3", "Quận 4", "Quận 5", "Quận 6", "Quận 7", "Quận 8", "Quận 9", "Quận 10", "Quận 11", "Quận 12", "Quận Bình Chánh", "Quận Bình Tân", "Quận Bình Thạnh", "Quận Gò Vấp", "Quận Hóc Môn", "Quận Nhà Bè", "Quận Phú Nhuận", "Quận Tân Bình", "Quận Tân Phú", "Quận Thủ Đức"]
    },
    {
        name  : "Hưng Yên",
        cities: ["Thị xã Hưng Yên", "Huyện Ân Thi", "Huyện Khoái Châu", "Huyện Kim Động", "Huyện Mỹ Hào", "Huyện Phù Cừ", "Huyện Tiên Lữ", "Huyện Văn Giang", "Huyện Văn Lâm", "Huyện Yên Mỹ"]
    },
    {
        name  : "Khánh Hòa",
        cities: ["Thành phố Nha Trang", "Thị xã Cam Ranh", "Huyện Cam Lâm", "Huyện Vạn Ninh", "Huyện Ninh Hòa", "Huyện Diên Khánh", "Huyện Khánh Vĩnh", "Huyện Khánh Sơn", "Huyện đảo Trường Sa"]
    },
    {
        name  : "Kiên Giang",
        cities: ["Thành phố Rạch Giá", "Thị xã Hà Tiên", "Huyện An Biên", "Huyện An Minh", "Huyện Châu Thành", "Huyện Giồng Riềng", "Huyện Gò Quao", "Huyện Hòn Đất", "Huyện Kiên Hải", "Huyện Kiên Lương", "Huyện Phú Quốc", "Huyện Tân Hiệp", "Huyện Vĩnh Thuận", "Huyện U Minh Thượng"]
    },
    {
        name  : "Kon Tum",
        cities: ["Thị xã Kon Tum", "Huyện Đắk Glei", "Huyện Đắk Hà", "Huyện Đắk Tô", "Huyện Kon Plông", "Huyện Kon Rẫy", "Huyện Ngọc Hồi", "Huyện Sa Thầy", "Huyện Tu Mơ Rông"]
    },
    {
        name  : "Lai Châu",
        cities: ["Thị xã Lai Châu", "Huyện Mường Tè", "Huyện Phong Thổ", "Huyện Sìn Hồ", "Huyện Tam Đường", "Huyện Than Uyên"]
    },
    {
        name  : "Lạng Sơn",
        cities: ["Thành phố Lạng Sơn", "Huyện Tràng Định", "Huyện Văn Lãng", "Huyện Văn Quan", "Huyện Bình Gia", "Huyện Bắc Sơn", "Huyện Hữu Lũng", "Huyện Chi Lăng", "Huyện Cao Lộc", "Huyện Lộc Bình", "Huyện Đình Lập"]
    },
    {
        name  : "Lào Cai",
        cities: ["Thành phố Lào Cai", "Huyện Bảo Thắng", "Huyện Bảo Yên", "Huyện Bát Xát", "Huyện Bắc Hà", "Huyện Mường Khương", "Huyện Sa Pa", "Huyện Si Ma Cai", "Huyện Văn Bàn"]
    },
    {
        name  : "Lâm Đồng",
        cities: ["Thành phố Đà Lạt", "Thị xã Bảo Lộc", "Huyện Lạc Dương", "Huyện Đơn Dương", "Huyện Đức Trọng", "Huyện Lâm Hà", "Huyện Đam Rông", "Huyện Bảo Lâm", "Huyện Di Linh", "Huyện Đạ Huoai", "Huyện Đạ Tẻh", "Huyện Cát Tiên"]
    },
    {
        name  : "Long An",
        cities: ["Thị xã Tân An", "Huyện Bến Lức", "Huyện Cần Đước", "Huyện Cần Giuộc", "Huyện Châu Thành", "Huyện Đức Hòa", "Huyện Đức Huệ", "Huyện Mộc Hóa", "Huyện Tân Hưng", "Huyện Tân Thạnh", "Huyện Tân Trụ", "Huyện Thạnh Hóa", "Huyện Thủ Thừa", "Huyện Vĩnh Hưng"]
    },
    {
        name  : "Nam Định",
        cities: ["Thành phố Nam Định", "Huyện Giao Thủy", "Huyện Hải Hậu", "Huyện Mỹ Lộc", "Huyện Nam Trực", "Huyện Nghĩa Hưng", "Huyện Trực Ninh", "Huyện Vụ Bản", "Huyện Xuân Trường", "Huyện Ý Yên"]
    },
    {
        name  : "Nghệ An",
        cities: ["Thành phố Vinh", "Thị xã Cửa Lò", "Thị xã Thái Hòa", "Huyện Anh Sơn", "Huyện Con Cuông", "Huyện Diễn Châu", "Huyện Đô Lương", "Huyện Hưng Nguyên", "Huyện Quỳ Châu", "Huyện Kỳ Sơn", "Huyện Nam Đàn", "Huyện Nghi Lộc", "Huyện Nghĩa Đàn", "Huyện Quế Phong", "Huyện Quỳ Hợp", "Huyện Quỳnh Lưu", "Huyện Tân Kỳ", "Huyện Thanh Chương", "Huyện Tương Dương", "Huyện Yên Thành"]
    },
    {
        name  : "Ninh Bình",
        cities: ["Thành phố Ninh Bình", "Thị xã Tam Điệp", "Huyện Gia Viễn", "Huyện Hoa Lư", "Huyện Kim Sơn", "Huyện Nho Quan", "Huyện Yên Khánh", "Huyện Yên Mô"]
    },
    {
        name  : "Ninh Thuận",
        cities: ["Thành phố Phan Rang-Tháp Chàm", "Huyện Bác Ái", "Ninh Hải", "Ninh Phước", "Ninh Sơn", "Thuận Bắc"]
    },
    {
        name  : "Phú Thọ",
        cities: ["Thành phố Việt Trì", "Thị xã Phú Thọ", "Huyện Cẩm Khê", "Huyện Đoan Hùng", "Huyện Hạ Hòa", "Huyện Lâm Thao", "Huyện Phù Ninh", "Huyện Tam Nông", "Huyện Tân Sơn", "Huyện Thanh Ba", "Huyện Thanh Sơn", "Huyện Thanh Thủy", "Huyện Yên Lập"]
    },
    {
        name  : "Phú Yên",
        cities: ["Thành phố Tuy Hòa", "Huyện Đông Hòa", "Huyện Đồng Xuân", "Huyện Phú Hòa", "Huyện Sơn Hòa", "Huyện Sông Cầu", "Huyện Sông Hinh", "Huyện Tây Hòa", "Huyện Tuy An"]
    },
    {
        name  : "Quảng Bình",
        cities: ["Thành phố Đồng Hới", "Huyện Bố Trạch", "Huyện Lệ Thủy", "Huyện Minh Hóa", "Huyện Quảng Trạch", "Huyện Quảng Ninh", "Huyện Tuyên Hóa"]
    },
    {
        name  : "Quảng Nam",
        cities: ["Thành phố Tam Kỳ", "Thành phố Hội An", "Huyện Duy Xuyên", "Huyện Đại Lộc", "Huyện Điện Bàn", "Huyện Đông Giang", "Huyện Nam Giang", "Huyện Tây Giang", "Huyện Quế Sơn", "Huyện Hiệp Đức", "Huyện Núi Thành", "Huyện Nam Trà My", "Huyện Bắc Trà My", "Huyện Phú Ninh", "Huyện Phước Sơn", "Huyện Thăng Bình", "Huyện Tiên Phước", "Huyện Nông Sơn"]
    },
    {
        name  : "Quảng Ngãi",
        cities: ["Thành phố Quảng Ngãi", "Huyện Ba Tơ", "Huyện Bình Sơn", "Huyện Đức Phổ", "Huyện Minh Long", "Huyện Mộ Đức", "Huyện Nghĩa Hành", "Huyện Sơn Hà", "Huyện Sơn Tây", "Huyện Sơn Tịnh", "Huyện Tây Trà", "Huyện Trà Bồng", "Huyện Tư Nghĩa", "Huyện đảo Lý Sơn"]
    },
    {
        name  : "Quảng Ninh",
        cities: ["Thành phố Hạ Long", "Thị xã Cẩm Phả", "Thị xã Móng Cái", "Thị xã Uông Bí", "Huyện Ba Chẽ", "Huyện Bình Liêu", "Huyện Cô Tô", "Huyện Đầm Hà", "Huyện Đông Triều", "Huyện Hải Hà", "Huyện Hoành Bồ", "Huyện Tiên Yên", "Huyện Vân Đồn", "Huyện Yên Hưng"]
    },
    {
        name  : "Quảng Trị",
        cities: ["Thị xã Đông Hà", "Thị xã Quảng Trị", "Huyện Cam Lộ", "Huyện Cồn Cỏ", "Huyện Đa Krông", "Huyện Gio Linh", "Huyện Hải Lăng", "Huyện Hướng Hóa", "Huyện Triệu Phong", "Huyện Vĩnh Linh"]
    },
    {
        name  : "Sóc Trăng",
        cities: ["Thành phố Sóc Trăng", "Huyện Long Phú", "Cù Lao Dung", "Mỹ Tú", "Thạnh Trị", "Vĩnh Châu", "Ngã Năm", "Kế Sách", "Mỹ Xuyên"]
    },
    {
        name  : "Sơn La",
        cities: ["Thị xã Sơn La", "Huyện Quỳnh Nhai", "Huyện Mường La", "Huyện Thuận Châu", "Huyện Phù Yên", "Huyện Bắc Yên", "Huyện Mai Sơn", "Huyện Sông Mã", "Huyện Yên Châu", "Huyện Mộc Châu", "Huyện Sốp Cộp"]
    },
    {
        name  : "Tây Ninh",
        cities: ["Thị xã Tây Ninh", "Huyện Tân Biên", "Huyện Tân Châu", "Huyện Dương Minh Châu", "Huyện Châu Thành", "Huyện Hòa Thành", "Huyện Bến Cầu", "Huyện Gò Dầu", "Huyện Trảng Bàng"]
    },
    {
        name  : "Thái Bình",
        cities: ["Thành phố Thái Bình", "Huyện Đông Hưng", "Huyện Hưng Hà", "Huyện Kiến Xương", "Huyện Quỳnh Phụ", "Huyện Thái Thụy", "Huyện Tiền Hải", "Huyện Vũ Thư"]
    },
    {
        name  : "Thái Nguyên",
        cities: ["Thành phố Thái Nguyên", "Thị xã Sông Công", "Huyện Phổ Yên", "Huyện Phú Bình", "Huyện Đồng Hỷ", "Huyện Võ Nhai", "Huyện Định Hóa", "Huyện Đại Từ", "Huyện Phú Lương"]
    },
    {
        name  : "Thanh Hoá",
        cities: ["Thành phố Thanh Hóa", "Thị xã Bỉm Sơn", "Thị xã Sầm Sơn", "Huyện Bá Thước", "Huyện Cẩm Thủy", "Huyện Đông Sơn", "Huyện Hà Trung", "Huyện Hậu Lộc", "Huyện Hoằng Hóa", "Huyện Lang Chánh", "Huyện Mường Lát", "Huyện Nga Sơn", "Huyện Ngọc Lặc", "Huyện Như Thanh", "Huyện Như Xuân", "Huyện Nông Cống", "Huyện Quan Hóa", "Huyện Quan Sơn", "Huyện Quảng Xương", "Huyện Thạch Thành", "Huyện Thiệu Hóa", "Huyện Thọ Xuân", "Huyện Thường Xuân", "Huyện Tĩnh Gia", "Huyện Triệu Sơn", "Huyện Vĩnh Lộc", "Huyện Yên Định"]
    },
    {
        name  : "Thừa Thiên-Huế",
        cities: ["Thành phố Huế", "Huyện A Lưới", "Huyện Hương Thủy", "Huyện Hương Trà", "Huyện Nam Đông", "Huyện Phong Điền", "Huyện Phú Lộc", "Huyện Phú Vang", "Huyện Quảng Điền"]
    },
    {
        name  : "Tiền Giang",
        cities: ["Thành phố Mỹ Tho", "Thị xã Gò Công", "Huyện Gò Công Đông", "Huyện Gò Công Tây", "Huyện Chợ Gạo", "Huyện Châu Thành", "Huyện Tân Phước", "Huyện Cai Lậy", "Huyện Cái Bè", "Huyện Tân Phú Đông"]
    },
    {
        name  : "Trà Vinh",
        cities: ["Thị xã Trà Vinh", "Huyện Càng Long", "Huyện Châu Thành", "Huyện Cầu Kè", "Huyện Tiểu Cần", "Huyện Cầu Ngang", "Huyện Trà Cú", "Huyện Duyên Hải"]
    },
    {
        name  : "Tuyên Quang",
        cities: ["Thị xã Tuyên Quang", "Huyện Chiêm Hoá", "Huyện Hàm Yên", "Huyện Na Hang", "Huyện Sơn Dương", "Huyện Yên Sơn"]
    },
    {
        name  : "Vĩnh Long",
        cities: ["Thị xã Vĩnh Long", "Huyện Bình Minh", "Huyện Bình Tân", "Huyện Long Hồ", "Huyện Mang Thít", "Huyện Tam Bình", "Huyện Trà Ôn", "Huyện Vũng Liêm"]
    },
    {
        name  : "Vĩnh Phúc",
        cities: ["Thành phố Vĩnh Yên", "Thị xã Phúc Yên", "Huyện Bình Xuyên", "Huyện Lập Thạch", "Huyện Tam Dương", "Huyện Tam Đảo", "Huyện Vĩnh Tường", "Huyện Yên Lạc"]
    },
    {
        name  : "Yên Bái",
        cities: ["Thành phố Yên Bái", "Thị xã Nghĩa Lộ", "Huyện Lục Yên", "Huyện Mù Cang Chải", "Huyện Trấn Yên", "Huyện Trạm Tấu", "Huyện Văn Chấn", "Huyện Văn Yên", "Huyện Yên Bình"]
    }
];