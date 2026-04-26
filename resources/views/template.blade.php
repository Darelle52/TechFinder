<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TechFinder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;800&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --bg: #f8fafc;
      --text: #1e293b;
      --muted: #64748b;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Syne', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .navbar-custom {
      background-color: var(--primary);
      padding: 0;
      border-bottom: 3px solid var(--primary-dark);
    }

    .navbar-brand-custom {
      font-family: 'Space Mono', monospace;
      font-weight: 700;
      font-size: 1.2rem;
      color: #fff !important;
      letter-spacing: -0.03em;
      padding: 0.9rem 1.5rem;
      border-right: 1px solid rgba(255,255,255,0.2);
      text-decoration: none;
      transition: background 0.2s;
    }
    .navbar-brand-custom:hover { background: var(--primary-dark); }

    .nav-links {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      flex: 1;
    }

    .nav-links li a {
      display: block;
      color: rgba(255,255,255,0.85);
      text-decoration: none;
      font-size: 0.82rem;
      font-weight: 600;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      padding: 1rem 1.2rem;
      border-right: 1px solid rgba(255,255,255,0.15);
      transition: color 0.2s, background 0.2s;
    }
    .nav-links li a:hover {
      color: #fff;
      background: var(--primary-dark);
    }

    .btn-connexion {
      font-family: 'Space Mono', monospace;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--primary);
      background: #fff;
      border: none;
      padding: 0.9rem 1.5rem;
      border-left: 1px solid rgba(255,255,255,0.2);
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      text-decoration: none;
      margin-left: auto;
    }
    .btn-connexion:hover {
      background: #e0f2fe;
      color: var(--primary-dark);
    }

    footer {
      background-color: var(--primary);
      border-top: 2px solid var(--primary-dark);
      padding: 0.75rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: rgba(255,255,255,0.8);
      font-size: 0.75rem;
      font-family: 'Space Mono', monospace;
    }

    .footer-left {
      color: #fff;
      letter-spacing: 0.1em;
      text-transform: uppercase;
    }

    /* Styles globaux pour les pages internes */
    .page-card {
      background: #fff;
      border: 0.5px solid #e2e8f0;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }

    .page-card .card-header-custom {
      font-size: 14px;
      font-weight: 600;
      color: var(--muted);
      margin-bottom: 16px;
      padding-bottom: 12px;
      border-bottom: 0.5px solid #e2e8f0;
    }

    .table thead tr {
      background: #f1f5f9;
    }

    .table thead th {
      font-size: 12px;
      font-weight: 600;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      border-bottom: 1px solid #e2e8f0;
    }

    .table tbody tr:hover td {
      background: #f8fafc;
    }

    .badge-role-admin { background: #fee2e2; color: #991b1b; padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 500; }
    .badge-role-technicien { background: #dbeafe; color: #1e40af; padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 500; }
    .badge-role-client { background: #fef3c7; color: #92400e; padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 500; }
    .badge-actif { background: #dcfce7; color: #166534; padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 500; }
    .badge-inactif { background: #fee2e2; color: #991b1b; padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 500; }
    .badge-bloque { background: #f3f4f6; color: #374151; padding: 3px 8px; border-radius: 20px; font-size: 11px; font-weight: 500; }

    .btn-edit-custom { background: #fef3c7; color: #92400e; border: none; padding: 4px 10px; border-radius: 6px; font-size: 12px; cursor: pointer; margin-right: 4px; }
    .btn-delete-custom { background: #fee2e2; color: #991b1b; border: none; padding: 4px 10px; border-radius: 6px; font-size: 12px; cursor: pointer; }
    .btn-edit-custom:hover { background: #fde68a; }
    .btn-delete-custom:hover { background: #fca5a5; }

    .btn-primary-custom {
      background: var(--primary);
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
    }
    .btn-primary-custom:hover { background: var(--primary-dark); }

    @media (max-width: 640px) {
      .nav-links li a { padding: 0.8rem 0.7rem; font-size: 0.72rem; }
      .btn-connexion { padding: 0.8rem 1rem; font-size: 0.72rem; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar-custom d-flex align-items-stretch">
    <a href="#" class="navbar-brand-custom">TechFinder</a>
    <ul class="nav-links">
      <li><a href="/web/competences">Compétences</a></li>
      <li><a href="/web/utilisateurs">Utilisateurs</a></li>
      <li><a href="#">Informations</a></li>
      <li><a href="#">Us-Con</a></li>
    </ul>
    <a href="#" class="btn-connexion">Connexion</a>
  </nav>

  @yield('main')

  <!-- FOOTER -->
  <footer>
    <span class="footer-left">3il 3</span>
    <span>© 2026 TechFinder</span>
  </footer>

  <!-- Toasts -->
  <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
    @if(session('success'))
      <div class="toast align-items-center text-bg-success border-0 show" role="alert">
        <div class="d-flex">
          <div class="toast-body"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
    @endif
    @if(session('error'))
      <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
        <div class="d-flex">
          <div class="toast-body"><i class="bi bi-x-circle me-2"></i>{{ session('error') }}</div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
    @endif
    @if(session('warning'))
      <div class="toast align-items-center text-bg-warning border-0 show" role="alert">
        <div class="d-flex">
          <div class="toast-body"><i class="bi bi-exclamation-circle me-2"></i>{{ session('warning') }}</div>
          <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
    @endif
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.toast').forEach(function (toastEl) {
        const toast = new bootstrap.Toast(toastEl, { autohide: true, delay: 4000 });
        toast.show();
      });
    });
  </script>

</body>
</html>
