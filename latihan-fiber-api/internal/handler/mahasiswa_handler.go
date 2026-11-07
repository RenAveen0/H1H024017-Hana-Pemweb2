package handler

import (
	"sort"
    "strconv"
	"github.com/gofiber/fiber/v3"
	"latihan-fiber-api/internal/model"
)

func DaftarMahasiswa(c fiber.Ctx) error {
	angkatan := c.Query("angkatan", "")
	if angkatan == "" {
		return c.JSON(fiber.Map{
			"sukses": true,
			"data": model.Daftar,
		})
	}
	nilaiAngkatan, err := strconv.Atoi(angkatan)
	if err != nil {
		return fiber.NewError(fiber.StatusBadRequest, "Parameter angkatan harus berupa angka")
	}
	hasil := []model.Mahasiswa{}
	for i := 0; i < len(model.Daftar); i++ {
		if model.Daftar[i].Angkatan == nilaiAngkatan {
			hasil = append(hasil, model.Daftar[i])
		}
	}
		urut := c.Query("urut", "")
		if urut == "nama" {
			sort.Slice(hasil, func(i, j int) bool {
				return hasil[i].Nama < hasil[j].Nama
			})
		} else if urut == "ipk" {
			sort.Slice(hasil, func(i, j int) bool {
				return hasil[i].Ipk > hasil[j].Ipk // Urutkan IPK dari yang tertinggi ke terendah
			})
		}

		return c.JSON(fiber.Map{
			"sukses": true,
			"data": hasil,
		})
}

func DetailMahasiswa(c fiber.Ctx) error {
	id, err := strconv.Atoi(c.Params("id"))
	if err != nil {
		return fiber.NewError(fiber.StatusBadRequest, "ID harus berupa angka")
	}
	for i := 0; i < len(model.Daftar); i++ {
		if model.Daftar[i].ID == id {
			return c.JSON(fiber.Map{
				"sukses": true,
				"data": model.Daftar[i],
			})
		}
	}
	return fiber.NewError(fiber.StatusNotFound, "Mahasiswa tidak ditemukan")
}

func DetailMahasiswaByNim(c fiber.Ctx) error {
    nim := c.Params("nim")
    for i := 0; i < len(model.Daftar); i++ {
        if model.Daftar[i].Nim == nim {
            return c.JSON(fiber.Map{
                "sukses": true,
                "data":   model.Daftar[i],
            })
        }
    }
    return fiber.NewError(fiber.StatusNotFound, "Mahasiswa dengan NIM tersebut tidak ditemukan")
}
