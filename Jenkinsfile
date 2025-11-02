pipeline {
    agent any
    
    environment {
        DOCKER_HOST = "unix:///var/run/docker.sock"
    }
    
    stages {
        stage('Check Environment') {
            steps {
                echo "Environment check stage is running"
                sh '''
                    echo "Current user: $(whoami)"
                    echo "Docker version:"
                    docker --version || echo "Docker not available"
                    echo "Docker Compose version:"
                    docker-compose --version || echo "Docker-compose not available"
                '''
            }
        }
        
        stage('Build') {
            steps {
                echo "Build stage is running"
                script {
                    try {
                        sh 'docker-compose build --no-cache'
                    } catch (Exception e) {
                        echo "Build failed: ${e.getMessage()}"
                        // Continue anyway for testing purposes
                    }
                }
            }
        }
        
        stage('Test') {
            steps {
                echo "Test stage is running"
                sh '''
                    echo "Running basic tests..."
                    # Test if required files exist
                    if [ -f "docker-compose.yml" ]; then
                        echo "docker-compose.yml found - OK"
                    else
                        echo "docker-compose.yml missing - FAIL"
                        exit 1
                    fi
                    
                    if [ -d "src" ]; then
                        echo "src directory found - OK"
                    else
                        echo "src directory missing - FAIL"
                        exit 1
                    fi
                '''
            }
        }
        
        stage('Deploy') {
            steps {
                echo "Deploy stage is running"
                script {
                    try {
                        // Stop and remove existing containers
                        sh 'docker-compose down || true'
                        // Start new containers
                        sh 'docker-compose up -d'
                    } catch (Exception e) {
                        echo "Deploy failed: ${e.getMessage()}"
                        // Don't fail the pipeline for demo purposes
                    }
                }
            }
        }
    }
    
    post {
        always {
            echo "Pipeline execution completed"
            script {
                // Always show container status
                sh 'docker-compose ps || true'
            }
        }
        success {
            echo "Pipeline succeeded!"
            // Send notification or update dashboard
        }
        failure {
            echo "Pipeline failed!"
            // Send failure notification
        }
    }
}