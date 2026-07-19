<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Amania Hotel — New Reservation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
    --cream: #FBF6EF;
    --parchment: #F7EFE3;
    --brown: #7A5238;
    --brown-dark: #5C3B26;
    --tan: #C9A583;
    --ink: #3A2E24;
    --muted: #8C7A67;
    --line: #E8DCC8;
  }

  * { box-sizing: border-box; }

  html, body {
    margin: 0;
    min-height: 100vh;
    font-family: 'Inter', sans-serif;
    color: var(--ink);
  }

  body {
    background-color: var(--parchment);
    background-image:
      linear-gradient(180deg, rgba(255,253,248,0.18) 0%, rgba(255,253,248,0.30) 45%, rgba(255,253,248,0.45) 100%),
      url('hotel-background.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px 16px;
  }

  .ticket {
    width: 100%;
    max-width: 460px;
    background: rgba(251, 247, 238, 0.96);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 20px;
    border: 1px solid rgba(122,82,56,0.22);
    box-shadow: 0 30px 70px -25px rgba(46,42,34,0.45);
    overflow: hidden;
  }

  .ticket-header {
    padding: 32px 32px 22px;
    text-align: center;
    position: relative;
  }

  .crest {
    font-size: 11px;
    letter-spacing: 0.24em;
    text-transform: uppercase;
    color: var(--brown);
    font-weight: 600;
    margin-bottom: 8px;
  }

  .brand {
    font-family: 'Fraunces', serif;
    font-size: 30px;
    font-weight: 600;
    letter-spacing: 0.01em;
    margin: 0;
    color: var(--ink);
  }

  .brand-sub {
    font-size: 13px;
    color: var(--muted);
    margin-top: 6px;
  }

  .ticket-header::after {
    content: "";
    display: block;
    width: 56px;
    height: 3px;
    background: var(--brown);
    border-radius: 4px;
    margin: 16px auto 0;
  }

  .ticket-body {
    padding: 8px 32px 32px;
  }

  .field { margin-bottom: 19px; }
  .field:last-of-type { margin-bottom: 0; }

  .field-label {
    display: flex;
    align-items: baseline;
    gap: 8px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: #8A5E3E;
    margin-bottom: 8px;
  }

  .field-label .num {
    font-family: 'Fraunces', serif;
    font-size: 15px;
    color: var(--ink);
    font-weight: 600;
    letter-spacing: 0;
    text-transform: none;
  }

  .hint {
    font-weight: 500;
    color: var(--muted);
    text-transform: none;
    font-size: 11px;
  }

  input, select {
    width: 100%;
    padding: 12px 14px;
    font-family: 'Inter', sans-serif;
    font-size: 14.5px;
    color: var(--ink);
    background: #ffffff;
    border: 1.5px solid var(--line);
    border-radius: 10px;
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
    appearance: none;
    -webkit-appearance: none;
  }

  select {
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='12' height='8'><path d='M1 1l5 5 5-5' stroke='%237A5238' stroke-width='1.8' fill='none' stroke-linecap='round'/></svg>");
    background-repeat: no-repeat;
    background-position: right 14px center;
    padding-right: 36px;
  }

  input:focus, select:focus {
    outline: none;
    border-color: var(--brown);
    box-shadow: 0 0 0 3px rgba(122,82,56,0.16);
  }

  input[readonly] {
    background: #F1E4D0;
    color: #6B4A31;
    font-weight: 600;
    cursor: not-allowed;
  }
  input[readonly]:focus { box-shadow: none; border-color: var(--line); }

  .row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
  }

  .perforation {
    position: relative;
    height: 0;
    margin: 24px -32px 22px;
    border-top: 2px dashed var(--line);
  }
  .perforation::before, .perforation::after {
    content: "";
    position: absolute;
    top: -10px;
    width: 20px; height: 20px;
    border-radius: 50%;
    background: var(--cream);
  }
  .perforation::before { left: -10px; }
  .perforation::after { right: -10px; }

  button[type="submit"] {
    width: 100%;
    margin-top: 26px;
    padding: 14px;
    background: linear-gradient(135deg, var(--brown), var(--brown-dark));
    color: #fff;
    border: none;
    border-radius: 10px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.03em;
    cursor: pointer;
    box-shadow: 0 10px 24px -10px rgba(122,82,56,0.5);
    transition: transform 0.12s ease, box-shadow 0.12s ease;
  }
  button[type="submit"]:hover { transform: translateY(-1px); }
  button[type="submit"]:active { transform: translateY(0); }

  #message {
    margin-top: 16px;
    font-size: 13.5px;
    font-weight: 600;
    text-align: center;
    min-height: 18px;
  }

  .stub-note {
    text-align: center;
    font-size: 11px;
    color: var(--muted);
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-top: 6px;
  }
</style>
</head>
<body>

<div class="ticket">
  <div class="ticket-header">
    <p class="crest">✦ Welcome ✦</p>
    <p class="brand">Amania Hotel</p>
    <p class="brand-sub">Guest Reservation Form</p>
  </div>

  <div class="ticket-body">
    <form id="reservationForm">
      <div class="field">
        <label class="field-label" for="customer_name"><span class="num">01</span> Name of Customer</label>
        <input type="text" id="customer_name" name="customer_name" placeholder="Full name" required>
      </div>

      <div class="row-2">
        <div class="field">
          <label class="field-label" for="check_in"><span class="num">02</span> Check In</label>
          <input type="date" id="check_in" name="check_in" required>
        </div>
        <div class="field">
          <label class="field-label" for="check_out"><span class="num">03</span> Check Out</label>
          <input type="date" id="check_out" name="check_out" required>
        </div>
      </div>

      <div class="perforation"></div>

      <div class="field">
        <label class="field-label" for="employee_name"><span class="num">04</span> Attending Employee</label>
        <select id="employee_name" name="employee_name" required>
          <option value="">-- loading employees... --</option>
        </select>
      </div>

      <div class="field">
        <label class="field-label" for="employee_id"><span class="num">05</span> Employee ID <span class="hint">(auto-filled)</span></label>
        <input type="text" id="employee_id" name="employee_id" placeholder="Select an employee first" readonly required>
      </div>

      <button type="submit">Create Reservation</button>
    </form>

    <div id="message"></div>
    <p class="stub-note">Reservation No. auto-generated on save</p>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>
