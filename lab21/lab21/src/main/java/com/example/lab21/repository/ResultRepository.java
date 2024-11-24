package com.example.lab21.repository;
import com.example.lab21.model.Result;
import org.springframework.data.jpa.repository.JpaRepository;
public interface ResultRepository extends JpaRepository<Result, Long> {
}