**Không cần đăng nhập**

- header
    
    Login (gồm cả Facebook, Google), register và quên mật khẩu
    
    cart, wishlist
    
    search
    
- footer
    
    hiển thị các thông tin liên lạc được lấy từ DB
    
- **Home**
    
    slider → hiển thị các slider giới thiệu các sản phẩm nổi bật
    
    on sale → hiển thị các products đang được giảm giá
    
    lastest product → cản products mới nhất
    
    Product Categories → những categories được chọn sẽ được hiển thị trên Home từ table home_categories
    
- Shopping
    
    Filter:
    
    - Category
    - Price
    - sorting
    - paginate
    
    Thêm vào cart, wishlist
    
- Details product
    
    Xem thông tin sản phẩm:
    
    - short description
    - description
    - review
    - price
    - attribute
    
    Xem thông tin các sản phẩm liên quan và phổ biến
    
    Đưa vào cart
    
    Chọn attribute và quantity đưa vào cart
    
- Cart
    
    Xem thông tin những sản phẩm đã đưa vào cart
    
    Thay đổi quantity sản phẩm hoặc xóa
    
    Đưa vào mục save later để vẫn giữ sản phẩm lại cart mà khi thanh toán không ảnh hưởng đến
    
    Xem các chi phí của các sản phẩm
    
    Nhập mã giảm giá
    
- Wishlist
    
    Lưu giữ các product yêu thích và để có thể đưa vào cart sau này
    
- Contact
    
    Gửi các thắc mắc 
    

****Cần đăng nhập****

logout

- User
    
    Check out được đơn hàng được đặt và hệ thống sẽ gửi mail thông báo thông tin đơn hàng đã đặt
    
    Thanh toán bằng Stripe
    
    - Dashboard
        
        Xem thông tin lịch sử mua hàng
        
        Hủy đơn hàng đã đặt
        
    
    Thay đổi thông tin cá nhân
    
    Thay đổi mật khẩu
    
- Admin
    1. Dashboard: Xem đơn hàng và thông tin tiền bán hàng của website
    2. Categories
    3. Attribute: thuộc tính của products
    4. All Products: tìm kiếm products
    5. Manage Home Slider
    6. Manage Home Categories
    7. Sale setting: thiết lập thời gian giảm giá cho các sản phẩm 
    8. All Coupons: tạo các mã giảm giá
    9. All Orders: Xem đơn hàng và thay đổi trạng thái đơn
    10. Contact message: quản lý các khiếu nại khách hàng
    11. Settings: thiết lập thông tin cá nhân cho website được hiển thị trong footer và contact
