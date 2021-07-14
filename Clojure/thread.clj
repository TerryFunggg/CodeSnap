;; Source: https://www.youtube.com/watch?v=qxE5wDbt964&t=403s
;; The code show that how Clojure using thread (->) and (->>) to fliter data on the fly.

(def common-words 
  (-> (slurp "https://www.textfixer.com/tutorials/common-english-words.txt")
      (clojure.string/split #",")
      ;; you can use thread last inside the thread first
      (->> set )))

(def text (slurp "http://www.clearwhitelight.org/hitch/hhgttg.txt"))

(print (->> text 
       (re-seq #"\w+")
       ;; but you can't use thread first inside thread last,
       ;; one way you can do is use anonymous function #() and '%' to determine the pass position
       (map #(clojure.string/lower-case %))
       (remove common-words)
       (frequencies)
       (sort-by val)
       (reverse)
       ;; the #_ can prevent clojure run it
       #_(last)))
