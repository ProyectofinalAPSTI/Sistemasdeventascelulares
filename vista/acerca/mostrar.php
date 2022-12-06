<style>
section {
  padding: 60px 0;
  overflow: hidden;
}

.section-bg {
  background-color: #f3f5fa;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
  color: #37517e;
}

.section-title h2::before {
  content: "";
  position: absolute;
  display: block;
  width: 120px;
  height: 1px;
  background: #ddd;
  bottom: 1px;
  left: calc(50% - 60px);
}

.section-title h2::after {
  content: "";
  position: absolute;
  display: block;
  width: 40px;
  height: 3px;
  background: #47b2e4;
  bottom: 0;
  left: calc(50% - 20px);
}

.section-title p {
  margin-bottom: 0;
}



.team .member {
  position: relative;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  padding: 30px;
  border-radius: 5px;
  background: #fff;
  transition: 0.5s;
}

.team .member .pic {
  overflow: hidden;
  width: 180px;
  border-radius: 50%;
}

.team .member .pic img {
  transition: ease-in-out 0.3s;
}

.team .member:hover {
  transform: translateY(-10px);
}

.team .member .member-info {
  padding-left: 30px;
}

.team .member h4 {
  font-weight: 700;
  margin-bottom: 5px;
  font-size: 20px;
  color: #37517e;
}

.team .member span {
  display: block;
  font-size: 15px;
  padding-bottom: 10px;
  position: relative;
  font-weight: 500;
}

.team .member span::after {
  content: "";
  position: absolute;
  display: block;
  width: 50px;
  height: 1px;
  background: #cbd6e9;
  bottom: 0;
  left: 0;
}

.team .member p {
  margin: 10px 0 0 0;
  font-size: 14px;
}

.team .member .social {
  margin-top: 12px;
  display: flex;
  align-items: center;
  justify-content: flex-start;
}

.team .member .social a {
  transition: ease-in-out 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50px;
  width: 32px;
  height: 32px;
  background: #eff2f8;
}

.team .member .social a i {
  color: #37517e;
  font-size: 16px;
  margin: 0 2px;
}

.team .member .social a:hover {
  background: #47b2e4;
}

.team .member .social a:hover i {
  color: #fff;
}

.team .member .social a+a {
  margin-left: 8px;
}

</style>

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="recursos/images/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Jhonatan Duran Aquise</h4>
                <span>Programador/Analista</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="recursos/images/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Marisabel Cordova Ordoñez</h4>
                <span>Diseñadora</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="recursos/images/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Enrique Catare Flores</h4>
                <span>Documentador</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="recursos/images/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Dulce Maria Diana Nina Torres</h4>
                <span>Testeadora</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->