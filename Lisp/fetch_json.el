(defvar base-url "https://jsonplaceholder.typicode.com/users")

(switch-to-buffer
 (url-retrieve-synchronously base-url))

(defun parse ()
  (let* ((json-result (json-parse-string
   (with-current-buffer
       (url-retrieve-synchronously base-url)
     (goto-char (point-min))
     (re-search-forward "^$")
     (delete-region (point) (point-min))
     (buffer-string))))
         (tmp (aref json-result 0))
         (name (gethash "name" tmp))
         (username (gethash "username" tmp))
         (city (gethash "city" (gethash "address" tmp)))
         )
         (concat name username "live in " city))
  )


