# Inicializa un nuevo repositorio de Git en el directorio actual.s
git init

# Añade todos los archivos nuevos y modificados al área de preparación (staging area).
git add .

# Realiza un commit con un mensaje descriptivo. Este commit guarda los cambios en el repositorio local.
git commit -m "first commit"

# Añade una nueva URL de repositorio remoto llamado "origin" y apunta a tu repositorio en GitHub.
git remote add origin https://github.com/NOMBRE_USUARIO/NOMBRE_PROYECTO.git

# Empuja (push) los cambios locales en la rama "master" al repositorio remoto "origin" y establece la rama "master" como la rama predeterminada para futuras operaciones push.
git push -u origin master 
