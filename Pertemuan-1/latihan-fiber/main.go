package main

import (
	"log"

	"github.com/gofiber/fiber/v3"
)

func main() {
	// Inisialisasi aplikasi Fiber
	app := fiber.New()

	// Endpoint dasar (Langkah 6)
	app.Get("/", func(c fiber.Ctx) error {
		return c.SendString("Halo Pemrograman Web II")
	})

	// Endpoint JSON info sistem (Langkah 7)
	app.Get("/api/info", func(c fiber.Ctx) error {
		return c.JSON(fiber.Map{
			"aplikasi": "Latihan Fiber",
			"versi":    "1.0.0",
			"status":   "berjalan",
		})
	})

	// TUGAS 1: Endpoint GET /api/mahasiswa
	app.Get("/api/mahasiswa", func(c fiber.Ctx) error {
		return c.JSON(fiber.Map{
			"nim":   "H1H024017",
			"nama":  "Hana Nur Fathiyyah",
			"prodi": "Teknik Komputer",
		})
	})

	// Menjalankan server pada port 3000
	log.Fatal(app.Listen(":3000"))
}
