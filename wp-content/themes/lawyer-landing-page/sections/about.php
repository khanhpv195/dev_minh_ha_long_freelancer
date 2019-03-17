<?php  
/**
 * About Us Section.
 *
 * @package Lawyer_Landing_Page
 */
    
    
$section_title   = get_theme_mod( 'about_section_page' );
$about_post      = get_theme_mod( 'about_post' );

$qry = new WP_Query( array( 'post_type' => array( 'post', 'page' ), 
                            'p'  => $about_post )
 );

if( $section_title || $about_post ){      
?>

<section class="about">
    <div class="container">
            
        <?php 
        
        lawyer_landing_page_get_section_header( $section_title );
			
        if( $about_post && $qry->have_posts() ) {
            while( $qry->have_posts() ){
                $qry->the_post();?>
				<div class="row">
				<?php if( has_post_thumbnail() ){ ?>
					<div class="img-holder">
					   <a href="<?php echo get_site_url()?>/2019/03/16/chung-cu-booyoung-2/">
					  	 <img width="456" height="268" src="./wp-content/uploads/2019/03/timthumb-456x268.jpg" alt="">
					   </a>
					</div>
					<?php } ?>
					<div class="text-holder">
					<h3 class="sub-title"><a href=<?php echo get_site_url()?>/2019/03/16/chung-cu-booyoung-2/">Chung Cư BOOYOUNG</a></h3>
						<p><strong>Tên dự án:</strong> Chung cư Quốc Tế&nbsp;BOOYOUNG VINA&nbsp;Mỗ Lao. Chủ đầu tư: Công Ty TNHH MTV Booyoung Việt Nam ( Hàn Quốc ) <br>
						<strong>Vị trí:</strong> Nằm trung tâm khu đô thị Mỗ Lao , Hà Đông. <br>
						<strong>Tổng mức đầu tư:</strong>&nbsp; 171 Triệu USD  <br>
						<strong>Đơn vị tư vấn thiết kế:</strong> Công ty ILJIN ( Hàn Quốc )&nbsp; 
						là một trong công ty thiết kế hàng đầu của Hàn Quốc cũng như trên thế giới 
						với rất nhiều dự án nổi tiếng.&nbsp;<br>
							<strong>Loại hình sở hữu:</strong> Sổ hồng vĩnh viễn. <a href="<?php echo get_site_url()?>/2019/03/16/chung-cu-booyoung-2/">Xem Thêm</a></p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="img-holder">
						<a href="<?php echo get_site_url()?>/2019/03/16/king-tower-ha-long/">
						  <img width="456" height="268" src="./wp-content/uploads/2019/03/6.jpg" alt="">
						</a>
					</div>
						<div class="text-holder">
						<h3 class="sub-title"><a href="<?php echo get_site_url()?>/2019/03/16/king-tower-ha-long/">KING TOWER HẠ LONG</a></h3>
						<p>
							Khu Đô Thị King Tower Hạ Long  
							tọa lạc tại vị trí trung tâm Bãi Cháy Thành phố du Lịch Hạ Long xinh đẹp,<br>
							 Khu Trung tâm Hành Chính Mới của Bãi Cháy Hạ Long, sở hữu nhiều tiện ích nội khu hiện đại với tiềm năng phát triển mạnh mẽ. <br>
							 King Tower Hạ Long được lấy ý tưởng từ Rancho Santa Marganita ở Mỹ hay Centenary City ở Nigeria – những thành phố trên lưng chừng đồi nổi tiếng <br>
							 <a href="<?php echo get_site_url()?>/2019/03/16/king-tower-ha-long/">Xem Thêm</a>
						</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="img-holder">
						<a href="<?php echo get_site_url()?>/2019/03/17/du-an-dat-nen-new-city-pho-noi-hung-yen/">
						  <img width="456" height="268" src="./wp-content/uploads/2019/03/aa.jpg" alt="">
						  </a>
					</div>
						<div class="text-holder">
						<h3 class="sub-title"><a href="<?php echo get_site_url()?>/2019/03/17/du-an-dat-nen-new-city-pho-noi-hung-yen/">DỰ ÁN ĐẤT NỀN NEW CITY PHỐ NỐI HƯNG YÊN</a></h3>
						<p>
						Không chỉ mang lại tiềm năng đầu tư lâu dài mà là bước ngoặt của tương lai. <br>
						 Được xem là thành phố tương lai là cửa ngõ phía Đông của Hà Nội với cơ hội tăng lợi nhuận từ 30-50%/2 năm <br>
						 là câu chuyện đầu tư hấp dẫn tất cả nhà đầu tư khi các kênh trị trường đang dần bị hạn chế khi ngân hàng lãi suất thấp và chứng khoán thị trường Bất bênh.
							 <a href="<?php echo get_site_url()?>/2019/03/17/du-an-dat-nen-new-city-pho-noi-hung-yen/">Xem Thêm</a>
						</p>
					</div>
				</div>

            <?php 

            }
            wp_reset_postdata(); 
        }
        ?>
    </div>
</section>

<?php
}