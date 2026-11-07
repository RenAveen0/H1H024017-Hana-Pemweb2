package middleware

import (
    "github.com/gofiber/fiber/v3"
    "latihan-fiber-api/internal/config"
)

func KunciApi() fiber.Handler {
    konf := config.Muat()
    return func(c fiber.Ctx) error {
        apiKey := c.Get("X-Api-Key")
        if apiKey == "" || apiKey != konf.ApiKey {
            return fiber.NewError(fiber.StatusUnauthorized, "Akses ditolak: X-Api-Key tidak valid atau tidak ditemukan")
        }
        return c.Next()
    }
}