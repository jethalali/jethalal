package com.example.lab21.model;
import jakarta.persistence.*;
@Entity

public class Result {
    @Id
    @GeneratedValue
    private Long id;

    private String studentId;
    private Double subject1Mse;
    private Double subject1Ese;
    private Double subject2Mse;
    private Double subject2Ese;
    private Double subject3Mse;
    private Double subject3Ese;
    private Double subject4Mse;
    private Double subject4Ese;
    private Double finalResult;

    // Getters and Setters
}
