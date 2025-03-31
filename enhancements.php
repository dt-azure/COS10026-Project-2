<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Home Page for The Pawsome Studio" />
  <meta name="author" content="Group: Pawsome" />
  <title>Enhancments</title>

  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="./style/style.css" />

  <!-- FontAwesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body>
  <?php include("./components/header.inc") ?>

  <section class="enhancements">
    <div class="container">
      <div class="section-content">
        <h2 class="section-header">Enhancements For the Website</h2>

        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Enhancement</th>
              <th>Details</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td>Responsiveness</td>
              <td>
                <p>Utilizing flexbox and grid to adjust layout for different screen sizes.</p>
                <p>Example: <a href="index.html#footer">Footer</a> of the homepage</p>
                <p>Large screen size:</p>
                <img src="./images/example_1.png" alt="Example 1">
                <p>Small screen size:</p>
                <img src="./images/example_2.png" alt="Example 2">
                <p>With grid we can easily decide the layout of the content. Here for medium screen size we have the first 2 items on the first row of the grid, and the last item to take up the whole second row:</p>
                <img src="./images/example_3.png" alt="Example 3">
                <p>Then for small screen size we can have only one item each row:</p>
                <img src="./images/example_4.png" alt="Example 4">
                <p>3 different screen sizes in comparison:</p>
                <img src="./images/example_5.png" alt="Example 5">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <?php include("./components/footer.inc") ?>
</body>

</html>