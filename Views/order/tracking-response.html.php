<h1 class="display-4">Hola! <?php echo ucwords($order->customer_name) ?></h1>
<p class="lead">Tu orden #<?php echo $order->order_number ?> en este momento esta en estado "<label style="color: red;"><?php echo ucwords($order->order_state_name) ?></label>"</p>
<hr class="my-4">
<p style="font-size: 13px" class="message">Si el estado de tu orden no cambia horas antes de la hora de entrega, ponte en contacto con nosotros por medio del whatsapp, envianos un mensaje <a class="" href="https://wa.link/j8qs9d">+57 310 526 1209</a>...</p>