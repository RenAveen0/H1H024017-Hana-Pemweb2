package model

import "time"

type TokenHitam struct {
    ID        uint      `gorm:"primaryKey" json:"id"`
    Token     string    `gorm:"type:text;not null" json:"token"`
    CreatedAt time.Time `json:"dibuat_pada"`
}