package main

import (
	"database/sql"
	"fmt"
	_ "github.com/go-sql-driver/mysql"
	"github.com/gorilla/mux"
	"log"
	"net/http"
)

const (
	DBHOST  = "127.0.0.1"
	DBPort  = ":PORT"
	DBUser  = "USERNAME"
	DBPass  = ""
	DB	= "DATABASE"
	PORT    = ":8000"
)

var database *sql.DB

type Page struct {
	Title   string
	Content string
	Date    string
}

func ServePage(w http.ResponseWriter, r *http.Request) {
	params := mux.Vars(r)
	pageGUID := params["guid"]
	page := Page{}
	fmt.Println(pageGUID)
	err := database.QueryRow("SELECT page_title,page_content,page_date FROM pages WHERE page_guid=?", pageGUID).Scan(&page.Title, &page.Content, &page.Date)
	if err != nil {
		http.Error(w, http.StatusText(404), http.StatusNotFound)
		log.Println("Can not get the page:" + pageGUID)
		log.Println(err.Error())
	} else {
		html := `<html><head><title>` + page.Title + `</title></head><body><h1>` + page.Title + `</h1><div>` + page.Content + `</div></body></html>`
		fmt.Fprintln(w, html)

	}

}

func main() {
	dbConn := fmt.Sprintf("%s:%s@tcp(%s)/%s", DBUser, DBPass, DBHOST+DBPort, DB)
	db, err := sql.Open("mysql", dbConn)
	if err != nil {
		log.Println("Couldn't connect!")
		log.Println(err.Error())
	}
	database = db

	routes := mux.NewRouter()
	routes.HandleFunc("/pages/{guid:[0-9a-zA\\-]+}", ServePage)
	http.Handle("/", routes)
	http.ListenAndServe(PORT, nil)
}
