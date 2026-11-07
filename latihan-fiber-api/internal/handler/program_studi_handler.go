package handler

import (
	"github.com/gofiber/fiber/v3"
	"latihan-fiber-api/internal/config"
	"latihan-fiber-api/internal/model"
)

func DaftarProgramStudiDenganJumlahMahasiswa(c fiber.Ctx) error {
	var hasil []map[string]interface{}

	// Menggunakan GORM untuk melakukan query gabungan (Left Join & Group By)
	err := config.DB.Model(&model.ProgramStudi{}).
		Select("program_studis.id", "program_studis.kode", "program_studis.nama", "program_studis.jenjang", "COUNT(mahasiswas.id) as jumlah_mahasiswa").
		Joins("LEFT JOIN mahasiswas ON mahasiswas.program_studi_id = program_studis.id").
		Group("program_studis.id").
		Scan(&hasil).Error

	if err != nil {
		return fiber.NewError(fiber.StatusInternalServerError, "Gagal mengambil data program studi")
	}

	return c.JSON(fiber.Map{
		"sukses": true,
		"data":   hasil,
	})
}