package com.example.lab21.controller;
import com.example.lab21.model.Result;
import com.example.lab21.repository.ResultRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@RestController
@RequestMapping("/api/results")
public class ResultController {
    @Autowired
    private ResultRepository resultRepository;

    // Endpoint to calculate the final result
    @PostMapping("/calculate")
    public Result calculateResult(@RequestBody Result result) {
        double subject1Final = (result.getSubject1Mse() * 0.30) + (result.getSubject1Ese() * 0.70);
        double subject2Final = (result.getSubject2Mse() * 0.30) + (result.getSubject2Ese() * 0.70);
        double subject3Final = (result.getSubject3Mse() * 0.30) + (result.getSubject3Ese() * 0.70);
        double subject4Final = (result.getSubject4Mse() * 0.30) + (result.getSubject4Ese() * 0.70);

        double finalResult = (subject1Final + subject2Final + subject3Final + subject4Final) / 4;

        result.setFinalResult(finalResult);

        return resultRepository.save(result);
    }
}
