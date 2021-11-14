;; Simple example for message and concat string using elisp
(message "He saw %d %s"
         (- fill-column 32)
         (concat "red "
                 (substring
                    "The quick brown foxes jumped." 16 21)
                    " leaping."))
