# Rode este script dentro do PowerShell.
# Ele clona o repositorio numa pasta nova, remove o que nao e usado, e sobe pro GitHub.

# 1. Ir para um local de trabalho (ajuste se quiser outro caminho)
cd C:\
git clone https://github.com/christianocassio/ccminforportifolio.git repo-limpo
cd repo-limpo

# 2. Remover pastas e arquivos nao usados pelo site (index.html / portfolio.html)
git rm -rf "_vti_cnf", "_vti_pvt", "bd", "downloads"

git rm -f `
  "forms.php", "home.php", "home.htm", `
  "gerador.html", "geradornov10mil.html", `
  "geral 10mil com 40mil numeros.html", `
  "geral 10mil statistica.html", `
  "geral 2_5 mil linhas  com titulo.html", `
  "geral8mil2 com titulo.html", `
  "roleta.html", "consultar.html", "cadempresa.html", "clienteoculto.html", `
  "contador.html", "discussaoclt61.html", "analisevisita.html", `
  "index2.html", "index3.htm", "index - copia.html", `
  "style.css", `
  "animated-messages-small2.gif", "arrow.gif", "bottom.gif", "calendar_month.gif", `
  "empty.png", "image.png", "info_callout_white.gif", `
  "logo-netsol.gif", "mosaico.png", "top.gif", `
  "desktop.ini", "discussao.txt", "curriculum.html"

# 3. Conferir o que sobrou antes de commitar
git status

# 4. Depois de conferir que sobrou so o essencial (index.html, portfolio.html, evidencias/),
#    descomente as duas linhas abaixo para commitar e subir:
# git commit -m "limpeza do repo e atualizacao do curriculo"
# git push
