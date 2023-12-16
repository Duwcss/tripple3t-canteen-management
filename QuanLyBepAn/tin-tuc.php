<!DOCTYPE html>
<html lang="en">
<style>
    h1 {
        color: #007BFF;
        text-align: center;
    }

    .news-list {
        list-style-type: none;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .news-item {
        width: 60%;
        border: 1px solid #ddd;
        margin: 10px;
        padding: 10px;
        background-color: #fff;
        transition: transform 0.2s;
        cursor: pointer;
    }

    .news-item:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .news-title {
        font-size: 20px;
        color: darkorange;
        cursor: pointer;
    }

    .news-content {
        display: none;
        margin-top: 10px;
    }

    .news-content img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 10px 0;
    }

    .news-content p {
        text-align: justify;
        text-indent: 20px;
    }

</style>
</style>

<head>
    <title>Tin Tức</title>
    <?php include("header.php"); ?>
    <!--===================MAIN=====================-->
    <div class="container-fluid">
        <ul class="news-list">
            <li class="news-item" onclick="toggleContent(1)">
                <h2 class="news-title">Bữa trưa ăn gì? Gợi ý 8 thực phẩm cho bữa ăn trưa</h2>
                <div class="news-content" id="content-1">
                    <img src="../QuanLyBepAn/img/anh_tintuc1.jpg" alt="Ảnh tin tức 1">
                    <h3><b>Dưới đây là 8 loại thực phẩm cho bữa trưa đơn giản, đủ chất và cũng tốt cho người đang giảm cân.</b></h3>
                    <ul style="list-style-type: decimal;">
                        <li>Cơm gạo lứt
                            <p>Gạo trắng mà chúng ta thường ăn thực ra đã bỏ đi lớp cám và mầm của gạo.
                                Trong khi lớp cám và mầm này rất giàu vitamin B6 và vitamin E tốt cho sức khỏe.
                                Trong khi đó, gạo lứt gần như giữ nguyên hàm lượng của những dưỡng chất này nên mang lại
                                nhiều lợi ích cho sức khỏe.</p>
                        </li>
                        <li>Khoai tây
                            <p>Khoai tây là một lựa chọn tốt để làm lương thực chính. Khoai tây giàu tinh bột, chất xơ, kali,
                                vitamin C, B6, protein… Ăn khoai tây sẽ tạo cảm giác no lâu. Lượng calo của 1 củ khoai tây nặng 370gr
                                chỉ tương đương nửa chiếc bánh hamburger.</p>
                        </li>
                        <li>Ức già
                            <p>Ức gà không xương và không da chứa khoảng 30% lượng protein và giàu phốt pho, kali, selen.
                                Nhờ hàm lượng dinh dưỡng cao và thân thiện với người giảm cân nên ức gà rất được những người tập gym ưa chuộng.</p>
                        </li>
                        <li>Trứng
                            <p>Trứng là một trong những thực phẩm rất tiện lợi cho bữa ăn trưa. Trứng chứa nhiều protein, chất béo, các chất
                                dinh dưỡng cần thiết cho người đang giảm cân.</p>
                        </li>
                        <li>Thịt heo
                            <p>Nếu chọn bữa ăn trưa đơn giản thì bạn nên chọn thịt heo nạc. Phần nạc thăn chứa ít chất béo hơn so
                                với thịt ở bụng và sườn.</p>
                        </li>
                        <li>Bông cải xanh
                            <p>Bữa trưa ăn gì? Bông cải xanh chứa nhiều hợp chất thực vật có tác dụng làm giảm nguy cơ ung thư tuyến tiền liệt,
                                ung thư dạ dày hay ung thư vú. Ngoài ra chất flavonoid giúp giảm nguy cơ mắc bệnh tim mạch, cải thiện hệ miễn dịch
                                và tốt cho mắt.</p>
                        </li>
                        <li>Cá hồi
                            <p>Cá hồi rất tốt cho sức khỏe vì chứa protein, chất béo lành mạnh, iốt và các chất dinh dưỡng khác giúp quá trình
                                trao đổi chất hoạt động tối ưu. Cá hồi cũng giúp bạn nhanh no, chứa omega-3 giúp giảm viêm. Thực phẩm này đóng vai
                                trò quan trọng trong việc kiểm soát béo phì và các bệnh về chuyển hóa.</p>
                        </li>
                        <li>Quả bơ
                            <p>Nếu đang thắc mắc bữa trưa nên ăn gì cho ngon và lành mạnh, bạn hãy đưa quả bơ vào thực đơn. Bơ chứa nhiều axit
                                oleic không bão hòa đơn, nước, chất xơ, kali… Những dưỡng chất này giúp cơ thể tăng quá trình hấp thụ các chất chống
                                oxy hóa lên gấp từ 2,6 đến 15 lần để mang lại nhiều lợi ích cho sức khỏe.</p>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="news-item" onclick="toggleContent(2)">
                <h2 class="news-title">Bữa trưa nên ăn gì? Gợi ý thực đơn giảm cân</h2>
                <div class="news-content" id="content-2">
                    <img src="../QuanLyBepAn/img/anh_tintuc2.jpg" alt="Ảnh tin tức 2">
                    <h3><b>Bạn có thể thiết kế thực đơn cho bữa ăn trưa giảm cân của mình như sau:</b></h3>
                    <ul style="list-style-type: decimal;">
                        <li>salad gà nướng, trứng, cà chua bi</li>
                        <li>gà nướng sốt mật ong, bún, bông cải xanh và rau luộc</li>
                        <li>bò nướng sốt tiêu xanh, rau củ luộc</li>
                        <li>đùi gà nướng, khoai tây nghiền, rau củ luộc</li>
                        <li>tôm sốt chanh dây, gạo tím than, bắp luộc</li>
                    </ul>
                    <p>Sau cùng, ngoài việc lựa chọn chuyện bữa trưa nên ăn gì thì bạn cũng nên dành một chút thời gian
                        nghỉ ngơi, vận động nhẹ nhàng để thức ăn dễ dàng chuyển hóa.</p>
                </div>
            </li>

            <li class="news-item" onclick="toggleContent(3)">
                <h2 class="news-title">Những quy định vệ sinh an toàn thực phẩm bếp ăn</h2>
                <div class="news-content" id="content-3">
                    <img src="../QuanLyBepAn/img/anh_tintuc3.png" alt="Ảnh tin tức 3">
                    <h3><b>Thế nào là bếp ăn tập thể an toàn thực phẩm:</b></h3>
                    <p>Bếp ăn tập thể là nơi để chế biến, nấu nướng cũng như phục vụ bữa cơm hằng ngày cho cả một tập thể gồm nhiều người
                        cùng ăn với nhau hay có thể cung cấp các xuất cơm cho một nơi khác. <br>
                        Hiện tại, có 2 loại hình thức dịch vụ ăn uống tại bếp ăn tập thể ở các cơ quan, doanh nghiệp đó là: Bếp ăn tập thể ký
                        hợp đồng cung cấp dịch vụ suất ăn công nghiệp với các công ty có giấy phép kinh doanh loại hình dịch vụ ăn uống
                        (hình thức này chiếm tới 80%) và bếp ăn tập thể do đơn vị tự nấu phục vụ nhân viên (chiếm 20%).</p>
                    <h3><b>Những quy định vệ sinh an toàn thực phẩm bếp ăn tập thể</b></h3>
                    <p>- Cơ sở vật chất, trang thiết bị, dụng cụ và người trực tiếp chế biến phục vụ ăn uống tại bếp ăn tập thể tuân thủ theo các yêu
                        cầu quy định tại Điều 1, 2, 3 và Điều 4 Thông tư số 15/2012/TT-BYT ngày 12-09-2012 của Bộ Y tế quy định về điều kiện chung bảo
                        đảm an toàn thực phẩm đối với cơ sở sản xuất, kinh doanh thực phẩm.</p>
                    <p> - Thiết kế có khu sơ chế nguyên liệu thực phẩm, khu chế biến nấu nướng, khu bảo quản thức ăn; khu ăn uống; kho nguyên liệu thực
                        phẩm, kho lưu trữ bảo quản thực phẩm bao gói sẵn riêng biệt; khu vực rửa tay và nhà vệ sinh cách biệt. Đối với bếp ăn tập thể sử dụng
                        dịch vụ cung cấp suất ăn sẵn chuyển đến phải bố trí khu vực riêng và phù hợp với số lượng suất ăn phục vụ để bảo đảm an toàn thực phẩm.</p>
                    <p>- Nơi chế biến thức ăn phải được thiết kế theo nguyên tắc một chiều; có đủ dụng cụ chế biến, bảo quản và sử dụng riêng đối với thực
                        phẩm tươi sống và thực phẩm đã qua chế biến; có đủ dụng cụ chia, gắp, chứa đựng thức ăn, dụng cụ ăn uống bảo đảm sạch sẽ, thực hiện chế
                        độ vệ sinh hàng ngày; trang bị găng tay sạch sử dụng một lần khi tiếp xúc trực tiếp với thức ăn; có đủ trang thiết bị phòng chống ruồi,
                        dán, côn trùng và động vật gây bệnh.</p>
                    <p>- Khu vực ăn uống phải thoáng mát, có đủ bàn ghế và thường xuyên phải bảo đảm sạch sẽ; có đủ trang thiết bị phòng chống ruồi, dán, côn
                        trùng và động vật gây bệnh; phải có bồn rửa tay, số lượng ít nhất phải có 01 (một) bồn rửa tay cho 50 người ăn; phải có nhà vệ sinh, số lượng
                        ít nhất phải có 01 (một) nhà vệ sinh cho 25 người ăn.</p>
                    <p>- Khu trưng bày, bảo quản thức ăn ngay, thực phẩm chín phải bảo đảm vệ sinh; thức ăn ngay, thực phẩm chín phải bày trên bàn hoặc giá cao
                        cách mặt đất ít nhất 60cm; có đủ trang bị và các vật dụng khác để phòng, chống bụi bẩn, ruồi, dán và côn trùng gây bệnh; có đủ dụng cụ bảo đảm
                        vệ sinh để kẹp, gắp, xúc thức ăn.</p>
                    <p>- Nước đá sử dụng trong ăn uống phải được sản xuất từ nguồn nước phù hợp với Quy chuẩn kỹ thuật quốc gia (QCVN) về chất lượng nước ăn uống
                        số 01:2009/BYT.</p>
                    <p> - Có đủ sổ sách ghi chép thực hiện chế độ kiểm thực 3 bước theo hướng dẫn của Bộ Y tế; có đủ dụng cụ lưu mẫu thức ăn, tủ bảo quản mẫu thức
                        ăn lưu và bảo đảm chế độ lưu mẫu thực phẩm tại cơ sở ít nhất là 24 giờ kể từ khi thức ăn được chế biến xong.</p>
                    <p> - Có đủ dụng cụ chứa đựng chất thải, rác thải và bảo đảm phải kín, có nắp đậy; chất thải, rác thải phải được thu dọn, xử lý hàng ngày theo
                        quy định; nước thải được thu gom trong hệ thống kín, bảo đảm không gây ô nhiễm môi trường.</p>

                </div>
            </li>
        </ul>

        <script>
            function toggleContent(newsId) {
                var content = document.getElementById('content-' + newsId);
                if (content.style.display === 'none') {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            }
        </script>
    </div>

    <?php include("footer.php"); ?>